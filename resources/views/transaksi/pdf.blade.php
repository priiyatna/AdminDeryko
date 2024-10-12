<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Transaksi Toko Deryko</h1>
    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Pembayaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->nama_produk }}</td>
                    <td>{{ $transaksi->harga }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->total_pembayaran }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

            <p>owner Delia</p>
</body>
</html>
