@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<div class="category-ui">
    <div class="category-ui__box">
        <h2 class="category-ui__title">Tambah Kategori</h2>

        <form action="/admin/categories" method="POST" class="category-ui__form">
            @csrf

            <div class="category-ui__group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <small class="category-ui__error">{{ $message }}</small>
                @enderror
            </div>

            <div class="category-ui__group">
                <label>Deskripsi</label>
                <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="category-ui__action">
                <button class="category-ui__btn category-ui__btn--primary">Simpan</button>
                <a href="/admin/categories" class="category-ui__btn category-ui__btn--secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
