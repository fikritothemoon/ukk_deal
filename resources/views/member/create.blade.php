@extends('template.master')

@section('content')
<div class="col-md-12">
  <div class="card card-primary">
     <div class="card-header">
       <h3 class="card-title">Menambahkan Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="/member" method="POST">
         @csrf
       <div class="card-body">
            <div class="form-group">
               <label for="harga_awal">Nama</label>
            <input type="text" name="nama" class="form-control" id="harga_awal" placeholder="Nama">
            </div>
            <div class="form-group">
               <label for="harga_awal">Alamat</label>
               <input type="text" name="alamat" class="form-control" id="harga_awal" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for="harga_awal">No Telepon</label>
                <input type="text" name="tlp" class="form-control" id="harga_awal" placeholder="No Telepon">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                  <option disabled selected>-- Pilih Salah Satu --</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
            </div>
       </div>
       <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="reset" class="btn btn-info"> Reset</button>
                </div>
     </form>
   </div>
 </div>
@endsection