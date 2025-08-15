@extends('dashboard.index')

@section('title', 'Edit Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('common.errors')
                <div class="mb-3">
                    <label for="category" class="form-label">Product Category</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="product" class="form-label">Product Name</label>
                    <input type="text" name="name" id="product" class="form-control" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Replace Image</label>
                    <input type="file" name="image" id="img" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="product-price" class="form-label">Product Price</label>
                    <input type="number" name="price" id="product-price" class="form-control" value="{{ old('price', $product->price) }}" step="any" required>
                </div>

                <div class="mb-3">
                    <label for="product-desc" class="form-label">Product Description</label>
                    <input type="text" name="description" id="product-desc" class="form-control" value="{{ old('description', $product->description)  }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
