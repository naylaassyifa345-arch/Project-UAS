@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-cards">
    <div class="card card-menu">
        <h4>Total Menu</h4>
        <p data-count="{{ $totalMenu }}">0</p>
    </div>

    <div class="card card-transaction">
        <h4>Total Transaksi</h4>
        <p data-count="{{ $totalTransaksi }}">0</p>
    </div>

    <div class="card card-stock">
        <h4>Total Stok</h4>
        <p data-count="{{ $totalStok }}">0</p>
    </div>

    <div class="card card-sales">
        <h4>Total Penjualan</h4>
        <p data-count="{{ $totalPenjualan }}">Rp 0</p>
    </div>
</div>

{{-- Animasi angka --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-count]").forEach(el => {
        const target = parseInt(el.dataset.count);
        let count = 0;
        const step = Math.ceil(target / 40);

        const interval = setInterval(() => {
            count += step;
            if (count >= target) {
                count = target;
                clearInterval(interval);
            }

            if (el.innerText.includes('Rp')) {
                el.innerText = 'Rp ' + count.toLocaleString('id-ID');
            } else {
                el.innerText = count;
            }
        }, 20);
    });
});
</script>
@endsection
