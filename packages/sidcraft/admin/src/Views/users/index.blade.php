{{-- @extends('sidcraft.admin.layouts.app') --}}
@extends('admin::layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="container">
        <h2>Users</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add User</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No Data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
