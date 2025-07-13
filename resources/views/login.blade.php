<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS from template -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" type="text/css">
    <!-- Custom Auth CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/auth.css') }}" type="text/css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-logo">
            <img src="{{ asset('template/img/logo.png') }}" alt="Logo">
        </div>
        <h2 class="text-center mb-4">Login</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>
    <script>
        @if (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
    <script>
        @if (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>
</body>
</html>