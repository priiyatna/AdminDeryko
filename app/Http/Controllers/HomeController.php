<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

use PDF;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function produk()
    {
        return view('produk');
    }
    public function transaksi(Request $request)
{
    $query = Transaksi::query();

    // Cek apakah ada input pencarian
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        // Pencarian berdasarkan nama produk
        $query->where('nama_produk', 'LIKE', "%$search%");
    }

    // Paginasi dengan 10 transaksi per halaman
    $transaksis = $query->paginate(10);

    return view('transaksi.index', compact('transaksis'));
}


    public function tambah()
    {
        return view('transaksi.tambah'); // Halaman tambah transaksi
    }

    public function submit(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date'
        ]);

        // Hitung total pembayaran
        $total_pembayaran = $request->harga * $request->jumlah;

        Transaksi::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total_pembayaran' => $total_pembayaran,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi')); // Halaman edit transaksi
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total_pembayaran' => $request->harga * $request->jumlah,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil diupdate!');
    }

    public function delete($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil dihapus!');
    }


    public function cetakPdf()
{
    $transaksis = Transaksi::all(); // Ambil semua data transaksi
    $pdf = PDF::loadView('transaksi.pdf', compact('transaksis')); // Load view ke PDF
    return $pdf->download('data-transaksi.pdf'); // Mengunduh file PDF
}

 
   

public function admin()
{
    $user = Auth::user(); // Mengambil data pengguna yang login
    return view('admin', compact('user')); // Mengirim data pengguna ke view
}

public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(), // Validasi email
    ]);

    $user = Auth::user(); // Ambil pengguna yang sedang login
    $user->name = $request->name; // Update nama
    $user->email = $request->email; // Update email
    $user->save(); // Simpan perubahan

    return redirect()->route('admin')->with('success', 'Profil berhasil diperbarui!');
}


    public function laporan_penjualan()
    {
        return view('laporan_penjualan');
    }

    public function laporan_stokbarang()
    {
        return view('laporan_stokbarang');
    }
  
}
