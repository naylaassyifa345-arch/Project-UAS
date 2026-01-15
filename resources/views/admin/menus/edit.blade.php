@extends('admin.layouts.app')

@section('content')

<div class="user-ui__box">
    <h2>Edit Menu</h2>

    <form action="/admin/menus/{{ $menu->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="user-ui__group">
            <label>Kategori</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="user-ui__group">
            <label>Nama Menu</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $menu->nama) }}" required>
        </div>

        <div class="user-ui__group">
            <label>Harga</label>
            <input type="number" name="harga"
                   value="{{ old('harga', $menu->harga) }}" required>
        </div>

        <div class="user-ui__group">
            <label>Stok</label>
            <input type="number" name="stok"
                   value="{{ old('stok', $menu->stok) }}" required>
        </div>

        <div class="user-ui__group">
            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
        </div>

        <div class="user-ui__group">
            <label>Gambar</label>
            @if($menu->gambar)
                <img src="{{ asset('storage/' . $menu->gambar) }}" class="menu-preview">
            @endif
            <input type="file" name="gambar">
        </div>

        <div class="user-ui__action">
            <button type="submit" class="user-ui__btn user-ui__btn--primary">
                Update
            </button>

            <a href="/admin/menus" class="user-ui__btn user-ui__btn--secondary">
                Kembali
            </a>
        </div>

    </form>
</div>

@endsection
