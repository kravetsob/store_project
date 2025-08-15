@extends('dashboard.index')

@section('title', 'Edit Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        @include('common.errors')
        <div class="card-body">
            <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" name="name" id="category" class="form-control" value="{{ old('name', $category->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Replace Image</label>
                    <input type="file" name="image" id="img" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
