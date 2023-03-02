@extends('template.master')

@section('judul')
<h1> Halaman Detail </h1>
@endsection

@section('content')
<div class="col-md-12">
  <div class="card card-primary">
     <div class="card-header">
       <h3 class="card-title">Menambahkan Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="{{ route ('member.update',[$member->id])}}" method="POST">
         @csrf
         @method('PUT') 
       <div class="card-body">
            <div class="form-group">
               <label for="harga_awal">Nama</label>
            <input type="text" name="nama" class="form-control" id="harga_awal" placeholder="Nama" value="{{ $member->nama }}" require>
            </div>
            <div class="form-group">
               <label for="harga_awal">Alamat</label>
               <input type="text" name="alamat" class="form-control" id="harga_awal" placeholder="Alamat" value="{{ $member->alamat }}" require>
            </div>
            <div class="form-group">
                <label for="harga_awal">No Telepon</label>
                <input type="text" name="tlp" class="form-control" id="harga_awal" placeholder="No Telepon" value="{{ $member->tlp }}" require>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                  <option value="L" require{{ $member->jenis_kelamin == "L" ? "selected" : "" }}>Laki-laki</option>
                  <option value="P" require {{ $member->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
                </select>
            </div>
       </div>
       <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                 <button type="reset" class="btn btn-info"> Reset</button>
                </div>
                </select>
            </div>
     </form>
   </div>
 </div>
@endsection