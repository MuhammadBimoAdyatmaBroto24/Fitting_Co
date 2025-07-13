@extends('adminlte::page')

@section('title', 'Manage Product Sizes')

@section('content_header')
    <h1>Manage Product Sizes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Sizes</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Stock</th>
                        <th style="width: 100px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productSizes as $productSize)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productSize->product->name }}</td>
                            <td>{{ $productSize->size }}</td>
                            <td>{{ $productSize->stock }}</td>
                            <td>
                                <a href="{{ route('admin.product-sizes.edit', $productSize->id) }}" class="btn btn-info btn-sm">Edit Stock</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $productSizes->links() }}
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
