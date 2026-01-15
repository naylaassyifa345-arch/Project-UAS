@extends('admin.layouts.app')

@section('title', 'Transaksi Baru')
@section('page-title', 'Transaksi Baru')

@section('content')

{{-- Error --}}
@if ($errors->any())
    <div class="alert alert-error">
        {{ $errors->first() }}
    </div>
@endif

<div class="form-wrapper">
    <form method="POST" action="/admin/transactions">
        @csrf

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th width="120">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->nama }}</td>
                            <td>Rp {{ number_format($menu->harga) }}</td>
                            <td>{{ $menu->stok }}</td>
                            <td>
                                <input type="number"
                                    class="input-qty"
                                    name="menus[{{ $loop->index }}][qty]"
                                    min="0"
                                    max="{{ $menu->stok }}"
                                    value="0">

                                <input type="hidden"
                                    name="menus[{{ $loop->index }}][id]"
                                    value="{{ $menu->id }}">


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Action --}}
        <div class="user-ui__action">
            <a href="/admin/menus" class="user-ui__btn user-ui__btn--secondary">
                Batal
            </a>
            <button type="submit" class="user-ui__btn user-ui__btn--primary">
                Simpan
            </button>
        </div>

    </form>
</div>

@endsection
