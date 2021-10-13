@extends('layouts.master')

@section('content')
        {{-- Validasi Notifikasi --}}
        {{-- @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data...!
            </div>
            <script>
                alert("Data Berhasil Bertambah...!");
            </script>
        @endif --}}

        <div class="row">
            <div class="col-11">
                <br>
                <h3 align="center">Data Mahasiswa</h3>
                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif

                {{-- notifikasi sukses 2 cara --}}
                @if ($sukses = Session::get('sukses'))
                {{-- <div class="alert alert-success alert-block"> --}}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <script>
                            alert("{{ $sukses }}");
                        </script>
                    {{-- <strong>{{ $sukses }}</strong> --}}
                {{-- </div> --}}
	            @endif


                <div class="col 2">
                    <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			            IMPORT EXCEL
		            </button>
                    <br>
                </div>
            </div>

            <div class="col-1">
                <!-- Button trigger modal -->
                <br>

                {{-- div khusus Import --}}
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
				<form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
                    @csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>

						<div class="modal-body">
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>

                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                Tambah
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" align="center">Tambah Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/siswa/create" method="POST" >
                            @csrf {{-- Token  --}}
                            <div class="form-group">
                                <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nim" required>
                            </div>
                            <div class="form-group">
                                <select name="jns" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="p">Perempuan</option>
                                <option value="l">Laki-laki</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" required>
                            </div>
                            <div class="form-group">
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Masukan alamat lengkap..." required></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <table align="center" class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                @php $i=1 @endphp
                @foreach($data as $datas)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $datas->nama }}</td>
                    <td>{{ $datas->nim }}</td>
                    <td>{{ $datas->jns }}</td>
                    <td>{{ $datas->agama }}</td>
                    <td>{{ $datas->alamat }}</td>
                    <td>
                        <a href="/siswa/{{ $datas->id }}/update" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/siswa/{{ $datas->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
@endsection

