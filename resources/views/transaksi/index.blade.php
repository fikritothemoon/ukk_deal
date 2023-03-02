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
        <a href="transaksi/create" class="btn btn-info mb-3">
          <i class="fas fa-plus"></i>
           Create
        </a>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
    <tr>
        <td>No</td>
        <td>Nama Member</td>
        <td>Nama Outlet</td>
        <td>Jenis Paket</td>
        <td>Total Bayar</td>
        <td>Status</td>
        <td>Dibayar</td>
        <td>Action</td>
    </tr>
        </thead>
        <tbody>
            <tr>
          @forelse($transaksi as $transaksi)
          <th>{{ $loop->iteration}}</th>
            <td>{{ $outlet_id->outlet_id }}</td>
            <td>{{ $member_id->member_id }}</td>
            <td>{{ $transaksi->tgl}}</td>
            <td>{{ $transaksi->batas_waktu}}</td>
            <td>{{ $paket->outlet_id }}</td>
            <td>{{ $transaksi->tgl_bayar}}</td>
            <td>{{ $transaksi->biaya_tambahan}}</td>
            <td>{{ $transaksi->diskon}}</td>
            <td>{{ $transaksi->pajak}}</td>
            <td>{{ $transaksi->status}}</td>
            <td>{{ $transaksi->dibayar}}</td>
            <td>{{ $user_id->user_id }}</td>
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