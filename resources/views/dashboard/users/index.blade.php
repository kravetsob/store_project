@extends('dashboard.index')

@section('title', 'Users')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Users</h2>
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">Create User</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->login }}</td>
                    <td class="text-center">
                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No users found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
