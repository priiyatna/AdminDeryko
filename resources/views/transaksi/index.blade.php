@extends('layouts.app')

@section('dashboard_title', 'Data Transaksi')

@section('content')

<!-- Content Row -->
<div class="row m-2">

<!-- Card jumlah Produk -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">50</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Jumlah Produk</div>
                   
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card PO -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">10</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        PO (Purchase Order)</div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Card customer -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-warning text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">7</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Customer</div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Card Admin -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-white-800">1</div>
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Admin</div>
                   
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container m-2">

    <!-- Form pencarian -->
    <form action="{{ route('transaksi') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari transaksi..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <a href="{{ route('transaksi.tambah') }}" class="btn btn-primary mb-4">Tambah Transaksi</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Pembayaran</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($transaksis->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Tidak ada transaksi ditemukan.</td>
                </tr>
            @else
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->nama_produk }}</td>
                        <td>{{ $transaksi->harga }}</td>
                        <td>{{ $transaksi->jumlah }}</td>
                        <td>{{ $transaksi->total_pembayaran }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('transaksi.delete', $transaksi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <a href="{{ route('transaksi.cetak.pdf') }}" class="btn btn-secondary mb-4">Cetak PDF</a>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
    {{ $transaksis->links('vendor.pagination.custom-pagination') }}
</div>
</div>
</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@endsection
