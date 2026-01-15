@extends('admin.layouts.app')

@section('title', 'Manajemen Menu')
@section('page-title', 'Manajemen Menu')

@section('content')

{{-- Alert --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Header --}}
<div class="page-header">
    <h2>Daftar Menu</h2>
    <a href="/admin/menus/create" class="btn-primary">
        + Tambah Menu
    </a>
</div>

{{-- Table --}}
<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th width="50">No</th>
                <th width="100">Gambar</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($menu->gambar)
                            <img
                                src="{{ asset('storage/' . $menu->gambar) }}"
                                class="menu-thumb"
                                alt="{{ $menu->nama }}"
                            >
                        @else
                            -
                        @endif
                    </td>

                    <td>{{ $menu->nama }}</td>
                    <td>{{ $menu->category->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($menu->harga) }}</td>
                    <td>{{ $menu->stok }}</td>

                    {{-- AKSI (SAMA PERSIS KATEGORI) --}}
                    <td class="action">
                        <a href="/admin/menus/{{ $menu->id }}/edit"
                           class="btn-edit">
                            Edit
                        </a>

                        <form action="/admin/menus/{{ $menu->id }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn-delete"
                                onclick="return confirm('Yakin hapus menu?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty">
                        Belum ada menu
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
