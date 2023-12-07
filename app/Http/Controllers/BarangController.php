<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /// ambil semua data barang
        $barang = Barang::all();

        return view('dashboard.barang.index', [
            'title' => 'Daftar Barang',
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /// generate kode_brg
        $barang_terakhir = Barang::all()->last();
        $kode_brg = '';

        if($barang_terakhir) {
            /// ambil kode_brg terakhir
            $kode_terkahir = $barang_terakhir->kode_brg;

            /// ambil no_urut, memisahkan prefix (BRG) dengan nomor urut (001)
            $ambil_no_urut = intval(substr($kode_terkahir, 3));

            /// dapatkan no_urut sekarang
            $no_urut_sekarang = str_pad($ambil_no_urut + 1, 3, '0', STR_PAD_LEFT);

            /// dapatkan kode barang sekarang
            $kode_brg = 'BRG' . $no_urut_sekarang;
        } else {
            $kode_brg = 'BRG001';
        }

        
        return view('dashboard.barang.create', [
            'title' => 'Buat Barang',
            'kode_brg' => $kode_brg
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// ambil data request
        $data = $request->all();

        /// simpan data ke database
        Barang::create($data);

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /// ambil barang berdasarkan id
        $barang = Barang::find($id);

        return view('dashboard.barang.edit', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// ambil semua data requst
        $data = $request->all();

        /// ambil barang berdasarkan id
        $barang = Barang::find($id);

        /// update barang
        $barang->update($data);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /// ambil barang berdasarkan id
        $barang = Barang::find($id);

        /// hapus barang
        $barang->delete();

        return redirect()->route('barang.index');
    }
}
