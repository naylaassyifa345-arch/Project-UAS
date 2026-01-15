@extends('admin.layouts.app')

@section('title', 'Manajemen User')
@section('page-title', 'Manajemen User')

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
    <h2>Daftar User</h2>
    <a href="/admin/users/create" class="btn-primary">+ Tambah User</a>
</div>

{{-- Table --}}
<div class="table-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="action">
                        <a href="/admin/users/{{ $user->id }}/edit" class="btn-edit">Edit</a>

                        <form action="/admin/users/{{ $user->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn-delete"
                                onclick="return confirm('Yakin hapus user?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty">
                        Belum ada user
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
