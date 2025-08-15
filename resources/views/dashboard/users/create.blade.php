@extends('dashboard.index')

@section('title', 'Create User')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Create New User</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('dashboard.users.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" name="login" id="login" class="form-control" value="{{ old('login') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
