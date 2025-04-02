@extends('layouts.client')

@section('title', $course->title)

@section('content')
<!-- Thêm meta CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Include jQuery nếu chưa có -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Thêm thư viện QR Code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <!-- breadcrumb start-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course-header">
                        <h1 class="course-title">{{ $course->title }}</h1>
                        <div class="course-meta">
                            <span class="duration"><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                            <span class="schedule"><i class="fas fa-calendar-alt"></i> {{ $course->schedule }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 course_details_left">
                    <div class="main_image">
                        @if($course->thumbnail)
                            <img class="img-fluid course-thumbnail" src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}">
                        @else
                            <img class="img-fluid course-thumbnail" src="{{ asset('assets/img/single_cource.png') }}" alt="{{ $course->title }}">
                        @endif
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Chi tiết khóa học</h4>
                        <div class="content">
                            {!! $course->description !!}
                        </div>


                        <div class="content">
                            {!! $course->objectives !!}
                        </div>

                        <h4 class="title mt-5">Danh sách bài giảng</h4>
                        <div class="content">


                            <div class="lessons-list mt-4">
                                @foreach($course->lessons->where('is_visible', true)->sortBy('sort_order') as $index => $lesson)
                                <div class="lesson-item">
                                    <div class="lesson-number">{{ $index + 1 }}</div>
                                    <div class="lesson-content">
                                        <h5>{{ $lesson->title }}</h5>
                                        <p>{{ $lesson->description }}</p>
                                        <div class="lesson-objectives">
                                            <strong>Mục tiêu bài học:</strong>
                                            <p>{{ $lesson->objectives }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($course->allow_registration == 1)
    <!-- Fixed Bottom Section -->
    <div class="fixed-bottom-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="price-info">
                        <span class="label">Học phí</span>
                        <div class="price-wrapper">
                            <h3 class="price">{{ number_format($course->sale_price, 0, ',', '.') }} VNĐ</h3>
                            @if($course->regular_price && $course->regular_price != $course->getCurrentPrice())
                                <span class="original-price"><del>{{ number_format($course->regular_price, 0, ',', '.') }} VNĐ</del></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="enrollment-info">
                        <div class="info-item">
                            <i class="fas fa-users"></i>
                            <div class="slots-price-info">
                                @if($course->original_price && $course->original_price != $course->getCurrentPrice())
                                    <span class="original-price-small"><del>{{ number_format($course->original_price, 0, ',', '.') }} VNĐ</del></span>
                                @endif
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ $course->schedule }}</span>
                        </div>
                        <div class="info-item countdown-container">
                            <i class="fas fa-clock"></i>
                            <div class="countdown-wrapper">
                                <span>Kết thúc sau:</span>
                                <div id="countdown" class="countdown">
                                    <div class="countdown-item">
                                        <span id="days">00</span>
                                        <span class="label">Ngày</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span id="hours">00</span>
                                        <span class="label">Giờ</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span id="minutes">00</span>
                                        <span class="label">Phút</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span id="seconds">00</span>
                                        <span class="label">Giây</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <button class="enroll-btn" onclick="openEnrollModal()">Mua khóa học</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal thanh toán -->
    <div class="modal fade" id="enrollmentModal" tabindex="-1" aria-labelledby="enrollmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="enrollmentModalLabel">Đăng ký khóa học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form đăng ký -->
                    <div id="registrationForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" onclick="showPaymentQR()">Tiếp tục thanh toán</button>
                        </div>
                    </div>

                    <!-- Thông tin thanh toán -->
                    <div id="paymentInfo" style="display: none;">
                        <div class="text-center mb-4">
                            <div class="price mb-4">
                                @if($course->original_price && $course->original_price != $course->getCurrentPrice())
                                    <span class="original-price"><del>{{ number_format($course->original_price, 0, ',', '.') }} VNĐ</del></span>
                                @endif
                                <span class="amount">{{ number_format($course->getCurrentPrice(), 0, ',', '.') }} VNĐ</span>
                            </div>

                            <div class="qr-container mb-4">
                                <img id="qrCode" class="qr-code" src="" alt="QR Code">
                            </div>

                            <div class="bank-info bg-light p-4 rounded mb-4">
                                <h6 class="fw-bold mb-3">Thông tin chuyển khoản</h6>
                                <ul class="list-unstyled text-start">
                                    <li class="mb-2"><strong>Ngân hàng:</strong> TPBANK</li>
                                    <li class="mb-2"><strong>Số tài khoản:</strong> 05261994118</li>
                                    <li class="mb-2"><strong>Chủ tài khoản:</strong> PHAM QUANG DAT</li>
                                    <li class="mb-2"><strong>Số tiền:</strong> <span class="fw-bold text-primary">{{ number_format($course->getCurrentPrice(), 0, ',', '.') }} VNĐ</span></li>
                                    <li class="mb-2"><strong>Nội dung CK:</strong> <span id="transferContent" class="fw-bold text-primary"></span></li>
                                </ul>
                            </div>

                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> Sau khi chuyển khoản, vui lòng chờ trong giây lát để chúng tôi xác nhận thanh toán.
                            </div>

                            <button type="button" class="btn btn-secondary" onclick="showRegistrationForm()">Quay lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
.course_details_area {
    padding: 80px 0 100px;
    background: #f8f9fa;
}

.course-header {
    text-align: center;
    margin-bottom: 50px;
    padding-top: 80px;
}

.course-title {
    font-size: 2.8rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 1rem;
}

.course-title:before {
    content: 'Khóa học:';
    display: inline;
    font-size: 2.8rem;
    color: #0d6efd;
    margin-right: 0.5rem;
    font-weight: 700;
}

.course-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: #0d6efd;
    border-radius: 3px;
}

.course-meta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 1rem;
}

.course-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6c757d;
    font-size: 1.1rem;
}

.course-meta i {
    color: #0d6efd;
}

.course-thumbnail {
    max-width: 100%;
    max-height: 400px;
    width: 100%;
    height: auto;
    object-fit: cover;
    margin: 0 auto;
    display: block;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.content_wrapper {
    margin-top: 50px;
    background: #fff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    max-width: 100%;
}

.course-outline {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.outline-item {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.outline-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.outline-item i {
    font-size: 2.5rem;
    color: #0d6efd;
    margin-bottom: 15px;
}

.outline-item h5 {
    font-size: 1.1rem;
    margin-bottom: 10px;
    color: #2c3e50;
    font-weight: 600;
}

.outline-item p {
    color: #6c757d;
    margin: 0;
    font-size: 1rem;
}

.fixed-bottom-section {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #fff;
    padding: 20px 0;
    box-shadow: 0 -5px 20px rgba(0,0,0,0.1);
    z-index: 1000;
    border-top: 1px solid #e9ecef;
}

.price-info {
    display: flex;
    flex-direction: column;
}

.price-info .label {
    font-size: 0.9rem;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.price-info .price {
    font-size: 1.8rem;
    font-weight: 700;
    color: #0d6efd;
    margin: 0;
}

.enrollment-info {
    display: flex;
    gap: 20px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #6c757d;
}

.info-item i {
    color: #0d6efd;
}

.enroll-btn {
    width: 100%;
    padding: 15px 30px;
    border: none;
    border-radius: 10px;
    background: #0d6efd;
    color: #fff;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.enroll-btn:hover {
    background: #0b5ed7;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
}

/* Modal Styles */
.modal-content {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.modal-header {
    background: #0d6efd;
    border-bottom: none;
    padding: 20px 30px;
}

.modal-body {
    padding: 2.5rem;
}

.price .amount {
    font-size: 2.5rem;
    font-weight: 700;
    color: #0d6efd;
    margin: 20px 0;
}

.qr-code {
    max-width: 300px;
    width: 100%;
    height: auto;
    padding: 20px;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.bank-info {
    background-color: #f8f9fa;
    border-left: 4px solid #0d6efd;
    border-radius: 10px;
    padding: 25px;
}

.bank-info ul li {
    padding: 12px 0;
    border-bottom: 1px dashed #dee2e6;
    color: #495057;
}

.bank-info ul li:last-child {
    border-bottom: none;
}

.alert-info {
    background-color: #e8f4ff;
    border: none;
    color: #004085;
    border-radius: 10px;
    padding: 15px 20px;
    margin: 20px 0;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
}

.btn {
    padding: 12px 25px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.btn-primary:hover {
    background-color: #0b5ed7;
    border-color: #0a58ca;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5c636a;
    border-color: #565e64;
    transform: translateY(-2px);
}

.form-control[type="tel"] {
    letter-spacing: 1px;
}

.form-control[type="tel"]::placeholder {
    letter-spacing: normal;
}

/* Thêm animation cho các hiệu ứng */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.modal-body > div {
    animation: fadeIn 0.5s ease-out;
}

@media (max-width: 768px) {
    .course-title {
        font-size: 2.2rem;
    }

    .course-meta {
        flex-direction: column;
        gap: 1rem;
    }

    .course-thumbnail {
        max-height: 300px;
    }

    .main_image {
        padding: 20px;
    }
}

@media (max-width: 576px) {
    .course-title {
        font-size: 1.8rem;
    }

    .course-meta span {
        font-size: 1rem;
    }

    .course-thumbnail {
        max-height: 250px;
    }

    .main_image {
        padding: 15px;
    }
}

.price-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

.original-price {
    color: #6c757d;
    font-size: 1.2rem;
    text-decoration: line-through;
}

.price {
    color: #0d6efd;
    font-size: 1.8rem;
    font-weight: bold;
    margin: 0;
}

.amount {
    color: #0d6efd;
    font-size: 1.5rem;
    font-weight: bold;
}

.countdown-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 10px;
}

.countdown-wrapper {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.countdown {
    display: flex;
    gap: 10px;
    background: #f8f9fa;
    padding: 8px;
    border-radius: 8px;
}

.countdown-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 45px;
    background: #fff;
    padding: 5px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.countdown-item span:first-child {
    font-size: 1.2rem;
    font-weight: bold;
    color: #0d6efd;
}

.countdown-item .label {
    font-size: 0.7rem;
    color: #6c757d;
    text-transform: uppercase;
}

.slots-price-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
}

.slots-text {
    font-weight: 500;
    color: #2c3e50;
}

.original-price-small {
    font-size: 0.85rem;
    color: #6c757d;
    text-decoration: line-through;
}

/* Lesson List Styles */
.lessons-list {
    margin-top: 30px;
}

.lesson-item {
    display: flex;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    margin-bottom: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.lesson-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.lesson-number {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0d6efd;
    color: white;
    font-weight: bold;
    font-size: 1.2rem;
    min-width: 60px;
    padding: 20px 10px;
}

.lesson-content {
    padding: 20px;
    flex: 1;
}

.lesson-content h5 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
}

.lesson-content p {
    color: #6c757d;
    margin-bottom: 15px;
}

.lesson-objectives {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #0d6efd;
}

.lesson-objectives strong {
    color: #2c3e50;
    display: block;
    margin-bottom: 5px;
}

.lesson-objectives p {
    margin-bottom: 0;
    font-size: 0.95rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set up CSRF token cho AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Mở modal
    window.openEnrollModal = function() {
        showRegistrationForm();
        $('#enrollmentModal').modal('show');
    };

    // Reset modal khi đóng
    $('#enrollmentModal').on('hidden.bs.modal', function() {
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('phone').value = '';
        showRegistrationForm();
    });

    // Khởi chạy đồng hồ đếm ngược
    startCountdown();
});

function showRegistrationForm() {
    document.getElementById('registrationForm').style.display = 'block';
    document.getElementById('paymentInfo').style.display = 'none';
}

function showPaymentQR() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();

    if (!name || !email || !phone) {
        alert('Vui lòng nhập đầy đủ thông tin');
        return;
    }

    if (!isValidEmail(email)) {
        alert('Vui lòng nhập email hợp lệ');
        return;
    }

    if (!isValidPhone(phone)) {
        alert('Vui lòng nhập số điện thoại hợp lệ');
        return;
    }

    // Tạo nội dung chuyển khoản: mã khóa học + số điện thoại
    const transferContent = `{{ $course->course_code }} ${phone}`;
    document.getElementById('transferContent').textContent = transferContent;

    // Tạo QR code với nội dung mới
    const amount = {{ $course->getCurrentPrice() }};
    const qrUrl = `https://img.vietqr.io/image/tpbank-05261994118-compact2.jpg?amount=${amount}&addInfo=${encodeURIComponent(transferContent)}`;
    document.getElementById('qrCode').src = qrUrl;

    // Hiển thị phần thanh toán
    document.getElementById('registrationForm').style.display = 'none';
    document.getElementById('paymentInfo').style.display = 'block';
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidPhone(phone) {
    const re = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;
    return re.test(phone);
}

// Thêm function đếm ngược
function startCountdown() {
    // Đặt thời gian kết thúc (ví dụ: 7 ngày từ hiện tại)
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 7);

    function updateCountdown() {
        const now = new Date();
        const distance = endDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = String(days).padStart(2, '0');
        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');

        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById('countdown').innerHTML = '<div class="expired">Đã kết thúc</div>';
        }
    }

    updateCountdown();
    const countdownTimer = setInterval(updateCountdown, 1000);
}
</script>

@endsection
