<!DOCTYPE html>
<html>
<head>
    <title>Thông tin đăng nhập khóa học</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #7b1fa2;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .credentials {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: #7b1fa2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Chào mừng bạn đến với khóa học!</h1>
        </div>
        <div class="content">
            <p>Xin chào {{ $user->name }},</p>

            <p>Cảm ơn bạn đã đăng ký khóa học <strong>{{ $course->title }}</strong>. Chúng tôi đã tạo tài khoản cho bạn với thông tin đăng nhập như sau:</p>

            <div class="credentials">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Mật khẩu:</strong> {{ $password }}</p>
            </div>

            <p>Vui lòng đăng nhập và đổi mật khẩu ngay khi bạn truy cập vào hệ thống.</p>

            <p>Để bắt đầu học, hãy nhấp vào nút bên dưới:</p>

            <a href="{{ url('/login') }}" class="button">Đăng nhập ngay</a>

            <p style="margin-top: 30px;">Nếu bạn cần hỗ trợ, vui lòng liên hệ với chúng tôi qua email hoặc hotline.</p>

            <p>Chúc bạn học tập hiệu quả!</p>
        </div>
    </div>
</body>
</html>
