@extends('template.master')

@section('judul')
 <h1> Halaman Transaksi </h1>
@endsection

@section('content')    
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
        <td class="th4">Harga</td>
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
            <td class="th2">{{ $transaksi->paket}}</td>
           
            </td>
         </tr>
         @empty
         <tr>
          <td>Data Masih Kosong</td>
        </tr>

        @endforelse
      </table>
    </div>
    <!-- /.card-body -->
  
@endsection

@push('scripts')
<script src="{{ asset ('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(function () {
     $('#data-transaksi').DataTransaksi();
        
      $('#example2').DataTransaksi({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
@endpush