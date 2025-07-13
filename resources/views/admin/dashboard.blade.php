@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard. Here you can manage users, products, orders, finance, and blog content.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <p>Manage user accounts.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <p>Manage products and inventory.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Go to Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <p>View and manage customer orders.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Go to Orders</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Finance</div>
                <div class="card-body">
                    <p>View financial reports and income.</p>
                    <a href="{{ route('admin.finance.index') }}" class="btn btn-primary">Go to Finance</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Blog</div>
                <div class="card-body">
                    <p>Manage blog posts and content.</p>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary">Go to Blog</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
