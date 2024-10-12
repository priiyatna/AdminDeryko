@extends('layouts.main')

@section('dashboard_title', 'Edit Transaksi')

@section('content')
<h1>Edit Transaksi</h1>
<div class="container">
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ $transaksi->nama_produk }}" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $transaksi->harga }}" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $transaksi->jumlah }}" required>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
</div>
</div>
</div>

@endsection
