@extends('partials.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_brg" class="form-label">Kode Barang</label>
                <input type="text" name="kode_brg" class="form-control" id="kode_brg" value="{{ $kode_brg }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_brg" class="form-label">Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" id="nama_brg">
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" name="satuan" class="form-control" id="satuan">
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" id="harga_beli">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection