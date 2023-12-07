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
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /// ambil data barang terakhir
        $barang_terakhir = Barang::all()->last();
        $kode_brg = '';

        if($barang_terakhir) {
            /// ambil id barang terakhir
            $urut_terkahir = $barang_terakhir->id;

            /// dapatkan no_urut sekarang
            $no_urut_sekarang = str_pad($urut_terkahir + 1, 3, '0', STR_PAD_LEFT);

            /// dapatkan kode barang sekarang
            $kode_brg = 'BRG' . $no_urut_sekarang;
        } else {
            $kode_brg = 'BRG001';
        }

        
        return view('dashboard.barang.create', [
            'kode_brg' => $kode_brg
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// ambil data form
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
        /// ambil data barang berdasarkan id
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
        /// ambil semua data form
        $data = $request->all();

        /// ambil data barang berdasarkan id
        $barang = Barang::find($id);

        /// update data barang
        $barang->update($data);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /// ambil data barang berdasarkan id
        $barang = Barang::find($id);

        /// hapus data barang
        $barang->delete();

        return redirect()->route('barang.index');
    }
}
