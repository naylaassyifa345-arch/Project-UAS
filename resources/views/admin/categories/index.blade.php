@extends('admin.layouts.app')

@section('title', 'Manajemen Kategori')
@section('page-title', 'Manajemen Kategori')

@section('content')

{{-- Alert --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

{{-- Header --}}
<div class="page-header">
    <h2>Daftar Kategori</h2>
    <a href="/admin/categories/create" class="btn-primary">
        + Tambah Kategori
    </a>
</div>

{{-- Table --}}
<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->nama }}</td>
                    <td>{{ $category->deskripsi ?? '-' }}</td>
                    <td class="action">
                        <a href="/admin/categories/{{ $category->id }}/edit"
                           class="btn-edit">
                            Edit
                        </a>

                        <form action="/admin/categories/{{ $category->id }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn-delete"
                                onclick="return confirm('Yakin hapus kategori?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty">
                        Belum ada kategori
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
