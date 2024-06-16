@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Perbarui User</h2>
        <form action="/user/update/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" value="{{ old('username', $user->username) }}">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah kata sandi.</small>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Peran</label>
                <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                    value="{{ old('role', $user->role) }}">
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui User</button>
        </form>
    </div>
@endsection
