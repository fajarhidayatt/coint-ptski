@extends('partials.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pembelian</h1>
    <a href="{{ route('pembelian.create') }}" class="btn btn-primary">+ Tambah Pembelian</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Transaksi</th>
                        <th>Kode Suplier</th>
                        <th>Tanggal Beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembelian as $item)    
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_transaksi }}</td>
                            <td>{{ $item->kode_spl }}</td>
                            <td>{{ $item->tgl_beli }}</td>
                            <td class="d-flex">
                                <a href="{{ route('pembelian.show', $item->id) }}" class="btn btn-warning">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection