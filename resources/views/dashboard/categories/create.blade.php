@extends('dashboard.index')

@section('title', 'Create Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Create New Category</h4>
        </div>
        @include('common.errors')
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" name="name" id="category" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Category Image</label>
                    <input type="file" name="image" id="img" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
