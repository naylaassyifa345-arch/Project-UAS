@extends('admin.layouts.app')

@section('title', 'Log Stok')
@section('page-title', 'Log Stok')

@section('content')

{{-- Header --}}
<div class="page-header">
    <h2>Log Stok</h2>
    <a href="/admin/stock-logs/create" class="btn-primary">
        + Tambah Log Stok
    </a>
</div>

{{-- Table --}}
<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>User</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $log->menu->nama ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $log->tipe == 'IN' ? 'badge-in' : 'badge-out' }}">
                            {{ $log->tipe }}
                        </span>
                    </td>
                    <td>{{ $log->jumlah }}</td>
                    <td>{{ $log->user->name ?? '-' }}</td>
                    <td>{{ $log->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty">
                        Belum ada log stok
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
