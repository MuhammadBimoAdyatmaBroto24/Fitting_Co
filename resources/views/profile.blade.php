@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>My Profile</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>My Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Profile Section Begin -->
    <section class="profile spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="profile__sidebar">
                        <h3>User Information</h3>
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <hr>
                        <h3>Change Password</h3>
                        @if (session('status') === 'password-updated')
                            <div class="alert alert-success">Password updated successfully.</div>
                        @endif
                        <form action="{{ route('profile.password.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirmation">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                            </div>
                            <button type="submit" class="site-btn">Update Password</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <h3>Order History</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                        <td><span class="badge badge-primary">{{ $order->status }}</span></td>
                                        <td><a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">You have no orders.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section End -->
@endsection
