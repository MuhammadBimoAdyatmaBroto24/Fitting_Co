@extends('layouts.admin')

@section('content')
<style>
    .custom-file-input {
        visibility: hidden;
        width: 0;
        height: 0;
        position: absolute;
    }
    .custom-file-label {
        cursor: pointer;
        background-color: #007bff;
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        display: inline-block;
        margin-bottom: 0;
    }
    .custom-file-label:hover {
        background-color: #0056b3;
    }
    .file-name-display {
        margin-left: 10px;
        font-style: italic;
        color: #555;
    }
</style>
<div class="container">
    <h1>Edit Product: {{ $product->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label>Product Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
                <span class="file-name-display" id="fileNameDisplay">{{ $product->image ? basename($product->image) : 'No file chosen' }}</span>
            </div>
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" width="100">
                    <small class="form-text text-muted">Current Image</small>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select a Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand_id">Brand</label>
            <select class="form-control" id="brand_id" name="brand_id" required>
                <option value="">Select a Brand</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Product Sizes</label>
            <div id="size-inputs-container">
                @foreach($product->sizes as $index => $size)
                    <div class="input-group mb-2 size-input-row">
                        <input type="hidden" name="sizes[{{ $index }}][id]" value="{{ $size->id }}">
                        <input type="text" name="sizes[{{ $index }}][size]" class="form-control" placeholder="Size (e.g., S, M, L)" value="{{ $size->size }}">
                        <input type="number" name="sizes[{{ $index }}][quantity]" class="form-control ml-2" placeholder="Quantity" value="{{ $size->quantity }}">
                        <input type="number" name="sizes[{{ $index }}][stock]" class="form-control ml-2" placeholder="Stock" value="{{ $size->stock }}" min="0">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger remove-size-input">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-success" id="add-size-input">Add Another Size</button>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
        document.getElementById('fileNameDisplay').textContent = fileName;
    });

    let sizeIndex = {{ count($product->sizes) }};
    document.getElementById('add-size-input').addEventListener('click', function() {
        const container = document.getElementById('size-inputs-container');
        const newRow = document.createElement('div');
        newRow.classList.add('input-group', 'mb-2', 'size-input-row');
        newRow.innerHTML = `
            <input type="text" name="sizes[${sizeIndex}][size]" class="form-control" placeholder="Size (e.g., S, M, L)">
            <input type="number" name="sizes[${sizeIndex}][quantity]" class="form-control ml-2" placeholder="Quantity">
            <input type="number" name="sizes[${sizeIndex}][stock]" class="form-control ml-2" placeholder="Stock" min="0">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-size-input">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
        sizeIndex++;
    });

    document.getElementById('size-inputs-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-size-input')) {
            e.target.closest('.size-input-row').remove();
        }
    });
</script>
@endpush
