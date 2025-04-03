@extends('layouts.client')

@section('title', 'Quên mật khẩu')

@section('content')
<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <div class="site-title">
                <span class="text-gradient">KhoaHocAI</span><span class="text-pro">.Pro</span>
            </div>
            <h2>Quên mật khẩu?</h2>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="login-form">
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

            <button type="submit" class="btn-login">
                Gửi link đặt lại mật khẩu
            </button>

            <div class="register-link">
                <a href="{{ route('login') }}">
                    <i class="fas fa-arrow-left"></i> Quay lại đăng nhập
                </a>
            </div>
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
}

.register-link a {
    color: #bb99ff;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.register-link a:hover {
    color: #cd9cff;
    text-decoration: none;
}

.alert {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #4ade80;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 25px;
    font-weight: 500;
}

.invalid-feedback {
    color: #ff6b6b;
    font-size: 0.875rem;
    margin-top: 5px;
}

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

    .login-header p {
        font-size: 1rem;
    }
}
</style>
@endsection
