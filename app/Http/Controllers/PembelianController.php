<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Dbeli;
use App\Models\Hbeli;
use App\Models\Hutang;
use App\Models\Stock;
use App\Models\Suplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /// ambil semua data hbeli
        $pembelian = Hbeli::all();

        return view('dashboard.pembelian.index', [
            'pembelian' => $pembelian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /// ambil data suplier dan barang
        $suplier = Suplier::all();
        $barang = Barang::all();

        /// ambil data pembelian terkahir
        $transaksi_terakhir = Hbeli::all()->last();

        /// ambil tahun dan bulan sekarang
        $tahun_bulan = Carbon::now()->format('Ym');
        $no_transaksi = '';

        if($transaksi_terakhir) {
            /// ambil id pembelian terakhir
            $urut_terkahir = $transaksi_terakhir->id;

            /// dapatkan no urut sekarang
            $urut_sekarang = str_pad($urut_terkahir + 1, 3, '0', STR_PAD_LEFT);

            /// dapatkan no_transaksi
            $no_transaksi = 'B' . $tahun_bulan . $urut_sekarang;
        } else {
            $no_transaksi = 'B' . $tahun_bulan . '001';
        }

        return view('dashboard.pembelian.create',[
            'suplier' => $suplier,
            'barang' => $barang,
            'no_transaksi' => $no_transaksi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// simpan data ke tbl_hbeli
        Hbeli::create([
            'no_transaksi' => $request->no_transaksi,
            'kode_spl' => $request->kode_spl,
            'tgl_beli' => $request->tgl_beli,
        ]);

        /// simpan data ke tbl_dbeli
        Dbeli::create([
            'no_transaksi' => $request->no_transaksi,
            'kode_brg' => $request->kode_brg,
            'harga_beli' => $request->harga_beli,
            'qty' => $request->qty,
            'diskon' => $request->diskon,
            'diskon_rp' => $request->diskon_rp,
            'total_rp' => $request->total_rp,
        ]);

        /// cek stock sebelumnya
        /// ambil data stock berdasarkan kode barang
        $stock = Stock::where('kode_brg', $request->kode_brg)->first();

        /// jika stock barang sebelumnya sudah ada, maka tambahkan, jika belum maka buat
        if($stock) {
            $stock->qty_beli += $request->qty;
            $stock->save();
        } else {
            Stock::create([
                'kode_brg' => $request->kode_brg,
                'qty_beli' => $request->qty,
            ]);
        }

        /// simpan data ke tbl_hutang
        Hutang::create([
            'no_transaksi' => $request->no_transaksi,
            'kode_spl' => $request->kode_spl,
            'tgl_beli' => $request->tgl_beli,
            'total_hutang' => $request->total_rp,
        ]);

        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /// ambil data pembelian berdasarkan id
        $hbeli = Hbeli::find($id);

        /// ambil data detail pembelian berdasarkan nomor transaksi
        $dbeli = Dbeli::where('no_transaksi', $hbeli->no_transaksi)->first();

        return view('dashboard.pembelian.show', [
            'hbeli' => $hbeli,
            'dbeli' => $dbeli
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
