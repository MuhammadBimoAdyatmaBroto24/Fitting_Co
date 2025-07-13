@extends('adminlte::page')

@section('title', 'Edit Product Size Stock')

@section('content_header')
    <h1>Edit Product Size Stock</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Stock for {{ $productSize->product->name }} (Size: {{ $productSize->size }})</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product-sizes.update', $productSize->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $productSize->stock) }}" min="0" required>
                    @error('stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Stock</button>
                <a href="{{ route('admin.product-sizes.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the AdminLTE package!"); </script>
@stop
