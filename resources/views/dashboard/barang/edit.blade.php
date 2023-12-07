@extends('partials.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_brg" class="form-label">Kode Barang</label>
                <input type="text" value="{{ $barang->kode_brg }}" name="kode_brg" class="form-control" id="kode_brg" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_brg" class="form-label">Nama Barang</label>
                <input type="text" value="{{ $barang->nama_brg }}" name="nama_brg" class="form-control" id="nama_brg">
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" value="{{ $barang->satuan }}" name="satuan" class="form-control" id="satuan">
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" value="{{ $barang->harga_beli }}" name="harga_beli" class="form-control" id="harga_beli">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection