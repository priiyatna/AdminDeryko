@extends('layouts.main')


@section('dashboard_title', 'Tambah Transaksi')

@section('content')
<div class="container">
  <h1>Tambah Transaksi</h1>
    <form action="{{ route('transaksi.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>
</div>
@endsection
