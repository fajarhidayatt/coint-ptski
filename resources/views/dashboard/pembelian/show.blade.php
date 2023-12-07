@extends('partials.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="mb-3">
            <label for="no_transaksi" class="form-label">No Transaksi</label>
            <input type="text" name="no_transaksi" class="form-control" id="no_transaksi" value="{{ $hbeli->no_transaksi }}" readonly>
        </div>
        <div class="mb-3">
            <label for="kode_spl" class="form-label">Kode Suplier</label>
            <input type="text" name="kode_spl" class="form-control" id="kode_spl" value="{{ $hbeli->kode_spl }}" readonly>
        </div>
        <div class="mb-3">
            <label for="tgl_beli" class="form-label">Tanggal Beli</label>
            <input type="text" name="tgl_beli" class="form-control" id="tgl_beli" value="{{ $hbeli->tgl_beli }}" readonly>
        </div>
        <div class="mb-3">
            <label for="kode_brg" class="form-label">Kode Barang</label>
            <input type="text" name="kode_brg" class="form-control" id="kode_brg" value="{{ $dbeli->kode_brg }}" readonly>
        </div>
        <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="text" name="harga_beli" class="form-control" id="harga_beli" value="{{ $dbeli->harga_beli }}" readonly>
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="text" name="qty" class="form-control" id="qty" value="{{ $dbeli->qty }}" readonly>
        </div>
        <div class="mb-3">
            <label for="total_rp" class="form-label">Total (Rp.)</label>
            <input type="text" name="total_rp" class="form-control" id="total_rp" value="{{ $dbeli->total_rp }}" readonly>
        </div>
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="text" name="diskon" class="form-control" id="diskon" value="{{ $dbeli->diskon }}" readonly>
        </div>
        <div class="mb-3">
            <label for="diskon_rp" class="form-label">Diskon (Rp.)</label>
            <input type="text" name="diskon_rp" class="form-control" id="diskon_rp" value="{{ $dbeli->diskon_rp }}" readonly>
        </div>
    </div>
</div>
@endsection