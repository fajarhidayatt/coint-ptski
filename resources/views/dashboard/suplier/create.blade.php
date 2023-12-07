@extends('partials.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('suplier.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_spl" class="form-label">Kode Suplier</label>
                <input type="text" name="kode_spl" class="form-control" id="kode_spl" value="{{ $kode_spl }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_spl" class="form-label">Nama Suplier</label>
                <input type="text" name="nama_spl" class="form-control" id="nama_spl">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection