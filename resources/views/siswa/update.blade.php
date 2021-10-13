@extends('layouts.master')

@section('content')
        @if(session('sukses'))
            {{-- <div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data...!
            </div> --}}
            <script>
                alert("Data Berhasil Update Bertambah...!");
            </script>
        @endif
        <div class="row">
            <div class="col-11">
                <br>
                <h3 align="center">Form Update Data Mahasiswa</h3>
            </div>
                <div class="modal-body">
                    <form action="/siswa/{{ $siswa->id }}/update" method="POST" >
                        @csrf {{-- Token  --}}
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap" required value="{{ $siswa->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input name="nim" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nim" required value="{{ $siswa->nim }}">
                        </div>
                        <div class="form-group">
                            <label for="jns">Pilih Jenis Kelamin</label>
                            <select name="jns" class="form-control" id="exampleFormControlSelect1">
                                <option value="Perempuan" @if($siswa->jns == 'Perempuan') selected @endif>Perempuan</option>
                                <option value="Laki-laki" @if($siswa->jns == 'Laki-laki') selected @endif>Laki-laki</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input name="agama" value="{{ $siswa->agama }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Masukan alamat lengkap..." required>{{ $siswa->alamat }}</textarea>
                        </div>
                        {{-- <a href="/siswa/{{ $siswa->id }}/prosesupdate" class="btn btn-primary">Update</a> --}}
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Ingin Update Data?')">Update</button>
                    </form>
                </div>
        </div>
@endsection


