@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="user-ui">
    <div class="user-ui__box">
        <h2 class="user-ui__title">Edit User</h2>

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

        <form method="POST" action="/admin/users/{{ $user->id }}" class="user-ui__form">
            @csrf
            @method('PUT')

            <div class="user-ui__group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="user-ui__group">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="user-ui__group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="user-ui__group">
                <label>Password <small>(kosongkan jika tidak diubah)</small></label>
                <input type="password" name="password">
            </div>

            <div class="user-ui__action">
                <button type="submit" class="user-ui__btn user-ui__btn--primary">
                    Update
                </button>
                <a href="/admin/users" class="user-ui__btn user-ui__btn--secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
