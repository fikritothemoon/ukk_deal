@extends('template.master')

@section('judul')
<h1>Halaman Create</h1>
@endsection

@section('content')
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Menambahkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/outlet" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Enter Your Name">
                  </div>
                  <div class="form-group">
                    <label for="inputAlamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Enter Your Alamat">
                  </div>
                    <label for="InputTelepon">Telepon</label>
                    <input type="text" name="tlp" class="form-control" placeholder="Enter Your Telepon">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                 <button type="reset" class="btn btn-info"> Reset</button>
                </div>
              </form>
            </div>
@endsection
