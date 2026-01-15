@extends('admin.layouts.app')

@section('title', 'Tambah Log Stok')
@section('page-title', 'Tambah Log Stok')

@section('content')

{{-- Error --}}
@if ($errors->any())
    <div class="alert alert-error">
        {{ $errors->first() }}
    </div>
@endif

<div class="user-ui">
    <div class="user-ui__box">
        <h2 class="user-ui__title">Tambah Log Stok</h2>

        <form method="POST" action="/admin/stock-logs">
            @csrf

            <div class="user-ui__group">
                <label>Menu</label>
                <select name="menu_id" required>
                    <option value="">-- Pilih Menu --</option>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">
                            {{ $menu->nama }} (stok: {{ $menu->stok }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="user-ui__group">
                <label>Tipe</label>
                <select name="tipe" required>
                    <option value="IN">IN (Tambah)</option>
                    <option value="OUT">OUT (Kurang)</option>
                </select>
            </div>

            <div class="user-ui__group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" min="1" required>
            </div>

            <div class="user-ui__group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" placeholder="Opsional">
            </div>

            <div class="user-ui__action">
                <button type="submit" class="user-ui__btn user-ui__btn--primary">
                    Simpan
                </button>

                <a href="/admin/stock-logs"
                   class="user-ui__btn user-ui__btn--secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
