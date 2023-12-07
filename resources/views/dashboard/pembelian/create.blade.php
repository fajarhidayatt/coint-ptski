@extends('partials.layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="no_transaksi" class="form-label">No Transaksi</label>
                <input type="text" name="no_transaksi" class="form-control" id="no_transaksi" value="{{ $no_transaksi }}" readonly>
            </div>
            <div class="mb-3">
                <label for="kode_spl" class="form-label">Kode Suplier</label>
                <select class="form-control" name="kode_spl" id="kode_spl">
                    @foreach ($suplier as $item)
                        <option value="{{ $item->kode_spl }}">{{ $item->kode_spl }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_beli" class="form-label">Tanggal Beli</label>
                <input type="datetime-local" name="tgl_beli" class="form-control" id="tgl_beli">
            </div>
            <div class="mb-3">
                <label for="kode_brg" class="form-label">Kode Barang</label>
                <select class="form-control" name="kode_brg" id="kode_brg">
                    @foreach ($barang as $item)
                        <option value="{{ $item->kode_brg }}">{{ $item->kode_brg }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" id="harga_beli" value="0" readonly>
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" name="qty" class="form-control" id="qty" value="0">
            </div>
            <div class="mb-3">
                <label for="total_rp" class="form-label">Total (Rp.)</label>
                <input type="number" name="total_rp" class="form-control" id="total_rp" value="0" readonly>
            </div>
            <div class="mb-3">
                <label for="diskon" class="form-label">Diskon (%)</label>
                <input type="number" name="diskon" class="form-control" id="diskon" value="0">
            </div>
            <div class="mb-3">
                <label for="diskon_rp" class="form-label">Diskon (Rp.)</label>
                <input type="number" name="diskon_rp" class="form-control" id="diskon_rp" value="0" readonly>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    const barang = {!! $barang !!};
    const kodeBrg = document.getElementById('kode_brg');
    const hargaBeli = document.getElementById('harga_beli');
    kodeBrg.addEventListener('change', () => {
        const brgSelect = barang.filter(brg => brg.kode_brg === kodeBrg.value);
        hargaBeli.value = brgSelect[0].harga_beli;
    });

    const qty = document.getElementById('qty');
    const totalRp = document.getElementById('total_rp');
    qty.addEventListener('input', () => {
        totalRp.value = qty.value * hargaBeli.value;
    });

    const diskon = document.getElementById('diskon');
    const diskonRp = document.getElementById('diskon_rp');
    diskon.addEventListener('input', () => {
        diskonRp.value = totalRp.value * (diskon.value / 100);
    });
</script>
@endsection