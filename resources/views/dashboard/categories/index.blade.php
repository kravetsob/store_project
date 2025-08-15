@extends('dashboard.index')

@section('title', 'Dashboard - Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Categories</h2>
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">Create Category</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.categories.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('dashboard.categories.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No categories found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
