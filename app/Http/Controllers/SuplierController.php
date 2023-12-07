<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /// ambil semua data suplier
        $suplier = Suplier::all();

        return view('dashboard.suplier.index', [
            'title' => 'Daftar Suplier',
            'suplier' => $suplier
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /// generate kode_brg
        $suplier_terakhir = Suplier::all()->last();
        $kode_spl = '';

        if($suplier_terakhir) {
            /// ambil kode_spl terakhir
            $kode_terkahir = $suplier_terakhir->kode_spl;

            /// ambil no_urut, memisahkan prefix (SPL) dengan nomor urut (001)
            $ambil_no_urut = intval(substr($kode_terkahir, 3));

            /// dapatkan no_urut sekarang
            $no_urut_sekarang = str_pad($ambil_no_urut + 1, 3, '0', STR_PAD_LEFT);

            /// dapatkan kode suplier sekarang
            $kode_spl = 'SPL' . $no_urut_sekarang;
        } else {
            $kode_spl = 'SPL001';
        }

        return view('dashboard.suplier.create', [
            'title' => 'Buat Suplier',
            'kode_spl' => $kode_spl
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// ambil semua data requst
        $data = $request->all();

        /// tambah data suplier
        Suplier::create($data);

        return redirect()->route('suplier.index');
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
        /// ambil data suplier berdasarkan id
        $suplier = Suplier::find($id);

        return view('dashboard.suplier.edit', [
            'title' => 'Edit Suplier',
            'suplier' => $suplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// ambil semua data request
        $data = $request->all();

        /// ambil data suplier berdasarkan id
        $suplier = Suplier::find($id);

        /// update data suplier
        $suplier->update($data);

        return redirect()->route('suplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /// ambil data suplier berdasarkan id
        $suplier = Suplier::find($id);

        /// delete data suplier
        $suplier->delete();

        return redirect()->route('suplier.index');
    }
}
