@extends('layouts.client')

@section('title', 'Đăng nhập')

@section('content')
<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <div class="site-title">
                <span class="text-gradient">KhoaHocAI</span><span class="text-pro">.Pro</span>
                    </div>
            <h2>Đăng nhập</h2>
                            </div>

        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                                <div class="input-group">
                    <span class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                                <div class="input-group">
                    <span class="input-icon">
                                        <i class="fas fa-lock"></i>
                                    </span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password">
                    <span class="toggle-password">
                        <i class="far fa-eye"></i>
                    </span>
                                </div>
                                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>

            <div class="form-group remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        Quên mật khẩu?
                                    </a>
                                @endif
            </div>

            <button type="submit" class="btn-login">
                Đăng nhập
                                </button>

            <!-- Tạm thời ẩn phần đăng ký
            <div class="register-link">
                Chưa có tài khoản?
                <a href="{{ route('register') }}">Đăng ký ngay</a>
            </div>
            -->
        </form>
    </div>
</div>

    <style>
.login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
    justify-content: center;
    background-color: #14082e;
    background-image:
        radial-gradient(circle at 10% 20%, rgba(120, 60, 180, 0.2) 0%, rgba(0, 0, 0, 0) 25%),
        radial-gradient(circle at 90% 80%, rgba(120, 60, 180, 0.2) 0%, rgba(0, 0, 0, 0) 25%),
        radial-gradient(circle at 50% 50%, rgba(60, 20, 100, 0.1) 0%, rgba(0, 0, 0, 0) 60%);
    padding: 40px 20px;
}

.login-box {
    width: 100%;
    max-width: 400px;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.login-header {
    text-align: center;
    margin-bottom: 40px;
}

.site-title {
    font-size: 2.2rem;
    font-weight: 800;
    margin-bottom: 15px;
    letter-spacing: -0.5px;
}

.text-gradient {
    background: linear-gradient(to right, #fff, #bb99ff);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    padding-right: 5px;
}

.text-pro {
    color: #CD9CFF;
    font-weight: 700;
}

.login-header h2 {
    color: #fff;
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.login-header p {
    color: #bb99ff;
    font-size: 1.1rem;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    color: #e5e0ff;
    margin-bottom: 8px;
        font-weight: 500;
    }

.input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon {
    position: absolute;
    left: 15px;
    color: #bb99ff;
}

.toggle-password {
    position: absolute;
    right: 15px;
    color: #bb99ff;
    cursor: pointer;
    }

    .form-control {
    width: 100%;
    padding: 10px 45px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    color: #fff;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    }

    .form-control:focus {
    background: rgba(255, 255, 255, 0.08);
    border-color: #bb99ff;
    box-shadow: 0 0 0 3px rgba(187, 153, 255, 0.25);
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #e5e0ff;
    position: relative;
}

.remember-me input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 16px;
    height: 16px;
    border: 2px solid #bb99ff;
    border-radius: 3px;
    background: transparent;
    position: relative;
    cursor: pointer;
    margin: 0;
    padding: 0;
}

.remember-me input[type="checkbox"]:checked {
    background: #bb99ff;
}

.remember-me input[type="checkbox"]:checked:after {
    content: '✓';
    color: #14082e;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
    line-height: 1;
}

.remember-me label {
    margin: 0;
    padding: 0;
    font-size: 0.95rem;
    line-height: 16px;
    cursor: pointer;
    user-select: none;
    display: flex;
    align-items: center;
}

.forgot-password {
    color: #bb99ff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.forgot-password:hover {
    color: #cd9cff;
    text-decoration: none;
}

.btn-login {
    width: 100%;
    padding: 12px;
    background: #CD9CFF;
    border: none;
    border-radius: 10px;
    color: #14082e;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
        transition: all 0.3s ease;
    margin-bottom: 15px;
}

.btn-login:hover {
    background: #d7adff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(205, 156, 255, 0.4);
}

.register-link {
    text-align: center;
    color: #e5e0ff;
}

.register-link a {
    color: #bb99ff;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}

.register-link a:hover {
    color: #cd9cff;
    text-decoration: none;
    }

    .invalid-feedback {
    color: #ff6b6b;
        font-size: 0.875rem;
        margin-top: 5px;
    }

/* Responsive Design */
    @media (max-width: 576px) {
    .login-box {
        padding: 25px 20px;
        }

    .site-title {
        font-size: 2rem;
        }

    .login-header h2 {
        font-size: 1.5rem;
        }
    }
    </style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle eye icon
        const eyeIcon = this.querySelector('i');
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
});
</script>
@endsection
