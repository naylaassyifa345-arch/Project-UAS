@extends('admin.layouts.app')

@section('content')

<div class="user-ui__box">
    <h2>Tambah Menu</h2>

    <form action="/admin/menus" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="user-ui__group">
            <label>Kategori</label>
            <select name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="user-ui__group">
            <label>Nama Menu</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="user-ui__group">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ old('harga') }}" required>
        </div>

        <div class="user-ui__group">
            <label>Stok Awal</label>
            <input type="number" name="stok" value="{{ old('stok', 0) }}" required>
        </div>

        <div class="user-ui__group">
            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="user-ui__group">
            <label>Gambar</label>
            <input type="file" name="gambar">
        </div>

        <div class="user-ui__action">
            <button type="submit" class="user-ui__btn user-ui__btn--primary">
                Simpan
            </button>

            <a href="/admin/menus" class="user-ui__btn user-ui__btn--secondary">
                Batal
            </a>
        </div>



    </form>
</div>

@endsection
