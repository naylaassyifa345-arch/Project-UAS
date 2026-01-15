@extends('admin.layouts.app')

@section('title', 'Data Transaksi')
@section('page-title', 'Data Transaksi')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h2>Data Transaksi</h2>
    <a href="/admin/transactions/create" class="btn-primary">
        + Transaksi Baru
    </a>
</div>

{{-- Table --}}
<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th width="150">Kode</th>
                <th>Tanggal</th>
                <th>User</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $trx)
                <tr>
                    <td>{{ $trx->kode_transaksi }}</td>
                    <td>{{ $trx->tanggal }}</td>
                    <td>{{ $trx->user->name ?? '-' }}</td>
                    <td>Rp {{ number_format($trx->total_harga) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">
                        Belum ada transaksi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
