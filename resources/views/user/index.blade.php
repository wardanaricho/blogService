@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Users</h1>
    <a href="" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create New User</a>
    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Username</th>
                <th class="py-2 px-4 border-b">role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user['id'] }}</td>
                    <td class="py-2 px-4 border-b">{{ $user['name'] }}</td>
                    <td class="py-2 px-4 border-b">{{ $user['username'] }}</td>
                    <td class="py-2 px-4 border-b">
                        {{ $user['role'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
