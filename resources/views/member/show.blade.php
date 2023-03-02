@extends('template.master')

@section('judul')
    <h1>Halaman Detail</h1>
@endsection

@section ('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="outlet/create" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputid">Nama</label>
                    <input type="text" name="Nama" class="form-control" id="inputnama" placeholder="Enter Nama" value="{{ $member->nama }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputalamat" placeholder="Enter Alamat" value="{{ $member->alamat }}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="inputTelepon">Telepon</label>
                    <input type="text" name="tlp" class="form-control" id="inputTelepon" placeholder="Enter Telepon" value="{{ $member->tlp }}" disabled>
                  </div>

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                  <option value="L" disabled {{ $member->jenis_kelamin == "L" ? "selected" : "" }}>Laki-laki</option>
                  <option value="P" disabled {{ $member->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
               </select>
                </div>


                <div class="card-footer">
              <a class="btn btn-primary" href="/member">
                <i class="nav-icon fas fa-solid fa-arrow-left"></i>
                Kembali
              </a>

                </div>
              </form>
            </div>
@endsection