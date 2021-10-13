<?php

namespace App\Http\Controllers;

use Session;
use App\Models\siswa;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class siswaController extends Controller
{
    public function index(){
        $data = siswa::all();
        return view('siswa.index', ['data' => $data]); //siswa = nama folder dan index nama filenya
    }

    public function create(Request $req){
        if (request('jns') == 'l' || request('jns') == 'p') {
        siswa::create($req->all()); //membuat create data
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diinput'); // menamplkan kembali data siswa
        // $data = siswa::all(); // membuat variabel data dan mengambil seluruh data
        // return view('siswa.index', ['data'=> $data]); // menampilkan data dari index


        // return $req->all();
        // $data = siswa::all();
        }
    }

    public function update($id){
        $siswa = siswa::find($id);
        return view('siswa/update', ['siswa' => $siswa]);
    }

    public function prosesupdate(Request $req, $id){
        $siswa = siswa::find($id); //cari/ tari data id
        $siswa->update($req->all());
        return redirect('/siswa')->with('sukses', 'Update Data Sukses');
    }

    public function delete($id){
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data Berhasil Terhapus');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses', 'Data Siswa Berhasil Diimport!');
        // $request->session()->flash('sukses', 'Data Siswa Berhasil Diimport!');
        // alihkan halaman kembali
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diimport');
    }
}
