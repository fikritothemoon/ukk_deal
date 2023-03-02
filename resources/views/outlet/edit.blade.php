@extends('template.master')

@section('judul')
<h1> Halaman Edit </h1>
@endsection

@section ('content')
<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Info Konfirmasi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route ('outlet.update',[$outlet->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputid">Nama</label>
                    <input type="integer" name="nama" class="form-control" id="inputnama" placeholder="Enter nama" value="{{ $outlet->nama }}" require>
                 
                    <label for="inputNamaKelas">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Enter Alamat"  value="{{ $outlet->alamat }}" require>                
                  
                    <label for="inputtelepon">Telepon</label>
                    <input type="text" name="tlp" class="form-control" id="inputtelepon" placeholder="Enter Telepon"  value="{{ $outlet->tlp }}" require>
               
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Save</button>
                 <button type="reset" class="btn btn-warning"> Reset</button>
                </div>
                </select>
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
@endsection