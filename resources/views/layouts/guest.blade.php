<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-dark: #4338ca;
            --light-bg: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 30px 25px;
            text-align: center;
        }

        .login-header h2 {
            margin: 0;
            font-weight: 600;
        }

        .login-header p {
            margin: 8px 0 0;
            opacity: 0.9;
        }

        .login-body {
            padding: 30px 25px;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.15);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .btn-login {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 12px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-login:hover {
            background: var(--primary-dark);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .input-group-text {
            background-color: white;
            border: 1px solid var(--border-color);
            border-right: none;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        @media (max-width: 576px) {
            .login-card {
                max-width: 100%;
            }

            .login-header, .login-body {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Login Card -->
    <div class="login-card">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Sign in to your account</p>
        </div>

        <div class="login-body">
            <!-- Display validation errors if any -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-login">Sign In</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
