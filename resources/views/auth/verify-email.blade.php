<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - khoahocai.pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: none;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: transparent;
            border-bottom: 2px solid rgba(0,0,0,0.1);
            padding: 1.5rem;
        }
        .card-header h3 {
            color: #2d3748;
            font-weight: 600;
            margin: 0;
        }
        .btn-primary {
            background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(142, 68, 173, 0.4);
        }
        .btn-outline-primary {
            border: 2px solid #8e44ad;
            color: #8e44ad;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(142, 68, 173, 0.4);
        }
        a {
            color: #8e44ad;
            transition: all 0.3s ease;
        }
        a:hover {
            color: #9b59b6;
            text-decoration: none;
        }
        .alert {
            border-radius: 8px;
            border: none;
        }
        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }
            .card {
                margin: 10px;
            }
            .card-header h3 {
                font-size: 1.5rem;
            }
            .btn {
                width: 100%;
                margin-top: 10px;
            }
            .d-flex {
                flex-direction: column;
                gap: 10px;
            }
            .d-flex a {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center mb-0">
                            <i class="fas fa-envelope-open-text me-2"></i>Verify Email
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4 text-center">
                            <i class="fas fa-envelope-open-text fa-3x mb-3" style="color: #8e44ad;"></i>
                            <p class="mb-0">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>{{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>Resend Verification Email
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fas fa-sign-out-alt me-2"></i>Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
