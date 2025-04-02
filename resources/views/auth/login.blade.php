<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - {{ config('app.name') }}</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center mb-0">
                            <i class="fas fa-user-circle me-2"></i>khoahocai.pro
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>{{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required autofocus
                                        placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required placeholder="Enter your password">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                                        <i class="fas fa-key me-1"></i>Forgot your password?
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt me-2"></i>Log in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.querySelector('.btn-outline-secondary i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.classList.remove('fa-eye');
                toggleButton.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleButton.classList.remove('fa-eye-slash');
                toggleButton.classList.add('fa-eye');
            }
        }
    </script>

    <style>
    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .card-header {
        background: #fff;
        padding: 20px;
        border-bottom: 1px solid #eee;
    }

    .card-header h3 {
        color: #8e44ad;
        font-size: 24px;
    }

    .form-label {
        color: #555;
        font-weight: 500;
    }

    .input-group-text {
        background: #f8f9fa;
        border: 1px solid #ced4da;
        color: #8e44ad;
    }

    .form-control {
        border: 1px solid #ced4da;
        padding: 12px;
    }

    .form-control:focus {
        border-color: #8e44ad;
        box-shadow: 0 0 0 0.25rem rgba(142, 68, 173, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
        border: none;
        padding: 12px 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(142, 68, 173, 0.4);
    }

    .btn-outline-secondary {
        border-color: #ced4da;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        color: #8e44ad;
    }

    .form-check-input:checked {
        background-color: #8e44ad;
        border-color: #8e44ad;
    }

    .text-decoration-none {
        color: #8e44ad;
        transition: all 0.3s ease;
    }

    .text-decoration-none:hover {
        color: #9b59b6;
    }

    .alert {
        border: none;
        border-radius: 8px;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 5px;
    }

    @media (max-width: 576px) {
        .card {
            margin: 15px;
        }

        .d-flex {
            gap: 10px;
        }

        .btn-primary {
            width: 100%;
            margin-top: 10px;
        }
    }
    </style>
</body>
</html>
