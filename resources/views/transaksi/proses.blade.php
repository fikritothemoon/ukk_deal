@extends('template.master')

@section('content')
<div class="row">
<div class="col-md-12">
  <!-- Form Element sizes -->
  <div class="card card-success">
    <div class="card-body">
      <form action="{{ route('transaksi.detail.store', request()->segment(2)) }}" method="post">
        @csrf
        <div class="row">
          <div class="form-group col-md-8">
            <select name="id_paket" id="id_paket" class="form-control">
              <option selected disabled>--Pilih Data Paket--</option>
              @forelse ($pakets as $paket)
                <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>                  
              @empty
                <option selected disabled>Tidak Ada Paket Tersedia</option>
              @endforelse
            </select>
            @error('id_paket')
              <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group  col-md-2">
            <input type="number" name="qty" id="qty" class="form-control" placeholder="Isi Qty">
            @error('qty')
              <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group  col-md-2">
            <input type="submit" value="Tambah" class="btn btn-success form-control">
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
<div class="row">
  <!-- left column -->
  <div class="col-md-8">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Member</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Pilih Data Member</label>
            <select name="id_member" id="id_member" class="form-control">
              <option selected disabled>--Pilih Data Member--</option>
              @forelse ($member as $member)
                <option value="{{ $member->id }}">{{ $member->nama }}</option>                  
              @empty
                <option selected disabled>Tidak Ada Paket Tersedia</option>
              @endforelse
            </select>
          </div>
        </div>
    </div>
    
  </div>
</div>

<div class="card">
    <div class="card-header">
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
      <h3 class="card-title">Data Transaksi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
      <table id="example2" class="table table-bordered table-hover">
        <thead>
    <tr>
        <td class="th1">NO</td>
        <td class="th5">Nama Outlet</td>
        <td class="th5">Nama Member</td>
        <td class="th3">Kode Invoice</td>
        <td class="th2">Tanggal</td>
        <td class="th4">Status</td>
        <td class="th4">Dibayar</td>
        <!-- <td class="th4">Harga</td> -->
        <td class="th4">Action</td>
    </tr>
        </thead>
        <tbody>
            <tr>
          @forelse($transaksi as $transaksi)
          <th class="th1">{{ $loop->iteration}}</th>
            <td class="th2">{{ $transaksi->outlet->nama}}</td>
            <td class="th2">{{ $transaksi->member->nama}}</td>
            <td class="th3">{{ $transaksi->kode_invoice}}</td>
            <td class="th2">{{ $transaksi->tgl}}</td>
            <td class="th2">{{ $transaksi->status}}</td>
            <td class="th2">{{ $transaksi->dibayar}}</td>
            <!-- <td class="th2">{{ $transaksi->paket}}</td> -->
            <td class="th4">
          <form action="{{ route ('transaksi.destroy', [$transaksi->id])}}" method="POST">
              <a class="btn btn-info mr-3" href="transaksi/{{$transaksi->id}}">
                <i class="fas fa-info-circle"></i>
                Detail
              </a>
              <a class="btn btn-warning mr-3" href="transaksi/{{$transaksi->id}}/edit">
              <i class="far fa-edit"></i> 
              Edit
              </a>
            @csrf
            @method('DELETE')
           <button type="submit" class="btn btn-danger" value="Delete">
           <i class="fas fa-solid fa-trash"></i>
            Delete
           </button>
          </form>
            </td>
         </tr>
         @empty
         <tr>
          <td>Data Masih Kosong</td>
        </tr>

        @endforelse
      </table>
    </div>

@endsection