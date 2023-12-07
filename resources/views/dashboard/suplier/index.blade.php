@extends('partials.layout')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Suplier</h1>
    <a href="{{ route('suplier.create') }}" class="btn btn-primary">+ Tambah Suplier</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Suplier</th>
                        <th>Nama Suplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suplier as $item)    
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_spl }}</td>
                            <td>{{ $item->nama_spl }}</td>
                            <td class="d-flex">
                                <a href="{{ route('suplier.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('suplier.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection