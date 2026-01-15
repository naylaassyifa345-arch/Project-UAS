@extends('admin.layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="user-ui">
    <div class="user-ui__box">
        <h2 class="user-ui__title">Tambah User</h2>

        {{-- Error --}}
        @if ($errors->any())
            <div class="user-ui__alert user-ui__alert--error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/admin/users" class="user-ui__form">
            @csrf

            <div class="user-ui__group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="user-ui__group">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username') }}" required>
            </div>

            <div class="user-ui__group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="user-ui__group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="user-ui__action">
                <button type="submit" class="user-ui__btn user-ui__btn--primary">
                    Simpan
                </button>
                <a href="/admin/users" class="user-ui__btn user-ui__btn--secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
