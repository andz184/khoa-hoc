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

<!-- Thêm SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                            <img class="img-fluid course-thumbnail" src="{{ env('APP_URL') . '/storage/app/public/' . $course->thumbnail }}" alt="{{ $course->title }}">
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
                                <i class="fas fa-info-circle"></i> Sau khi chuyển khoản, vui lòng nhấn nút xác nhận thanh toán bên dưới.
                            </div>

                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <button type="button" class="btn btn-secondary" onclick="showRegistrationForm()">Quay lại</button>
                                <button type="button" class="btn btn-primary" id="confirmPayment" onclick="confirmPayment()">Xác nhận thanh toán</button>
                            </div>

                            <!-- Thông báo thành công -->
                            <div id="successMessage" class="alert alert-success mt-4" style="display: none;">
                                <i class="fas fa-check-circle"></i> Đăng ký khóa học thành công! Vui lòng kiểm tra email của bạn.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
.course_details_area {
    padding: 80px 0 100px;
    background-color: #0f081a;
    background-image:
        radial-gradient(circle at 10% 20%, rgba(120, 60, 180, 0.2) 0%, rgba(0, 0, 0, 0) 25%),
        radial-gradient(circle at 90% 80%, rgba(120, 60, 180, 0.2) 0%, rgba(0, 0, 0, 0) 25%),
        radial-gradient(circle at 50% 50%, rgba(60, 20, 100, 0.1) 0%, rgba(0, 0, 0, 0) 60%);
    background-attachment: fixed;
}

.course-header {
    text-align: center;
    margin-bottom: 50px;
    padding-top: 80px;
    color: #ffffff;
}

.course-title {
    font-size: 2.8rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.course-title:before {
    content: 'Khóa học:';
    display: inline;
    font-size: 2.8rem;
    color: #cb9dff;
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
    background: #CD9CFF;
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
    color: #e5e0ff;
    font-size: 1.1rem;
}

.course-meta i {
    color: #cb9dff;
}

.main_image {
    background: #ffffff;
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.course-thumbnail {
    max-width: 100%;
    max-height: 400px;
    width: 100%;
    height: auto;
    object-fit: cover;
    margin: 0 auto;
    display: block;
    border-radius: 8px;
}

.content_wrapper {
    margin-top: 50px;
    background: rgba(255, 255, 255, 0.95);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    max-width: 100%;
}

.content_wrapper .title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 20px;
}

.content_wrapper .content {
    color: #333333;
    font-size: 16px;
    line-height: 1.7;
    font-family: 'Roboto', 'Segoe UI', 'Helvetica Neue', -apple-system, BlinkMacSystemFont, Arial, sans-serif;
}

.content_wrapper .content p,
.content_wrapper .content span,
.content_wrapper .content li,
.content_wrapper .content a,
.content_wrapper .content h1,
.content_wrapper .content h2,
.content_wrapper .content h3,
.content_wrapper .content h4,
.content_wrapper .content h5,
.content_wrapper .content h6 {
    color: #333333 !important;
    font-family: 'Roboto', 'Segoe UI', 'Helvetica Neue', -apple-system, BlinkMacSystemFont, Arial, sans-serif;
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
    background: rgba(15, 8, 26, 0.95);
    padding: 20px 0;
    box-shadow: 0 -5px 20px rgba(0,0,0,0.2);
    z-index: 1000;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.price-info {
    display: flex;
    flex-direction: column;
}

.price-info .label {
    font-size: 0.9rem;
    color: #e5e0ff;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.price-info .price {
    font-size: 1.8rem;
    font-weight: 700;
    color: #CD9CFF;
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
    color: #e5e0ff;
}

.info-item i {
    color: #cb9dff;
}

.enroll-btn {
    width: 100%;
    padding: 15px 30px;
    border: none;
    border-radius: 50px;
    background: #CD9CFF;
    color: #fff;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 8px 20px rgba(183, 109, 212, 0.5);
    position: relative;
    overflow: hidden;
}

.enroll-btn:hover {
    background: #d7adff;
    box-shadow: 0 10px 25px rgba(183, 109, 212, 0.6);
    transform: translateY(-2px);
}

.enroll-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: all 0.5s ease;
}

.enroll-btn:hover::before {
    left: 100%;
}

/* Modal Styles */
.modal-content {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    background-color: #fff;
}

.modal-header {
    background: #8a4cbf;
    border-bottom: none;
    padding: 20px 30px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.modal-title {
    color: white;
    font-weight: 600;
    font-size: 1.25rem;
}

.btn-close {
    background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
    opacity: 0.8;
}

.btn-close:hover {
    opacity: 1;
}

.modal-body {
    padding: 2.5rem;
    background-color: #fff;
}

.price .amount {
    font-size: 2.5rem;
    font-weight: 700;
    color: #CD9CFF;
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
    border-left: 4px solid #CD9CFF;
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

.bank-info ul li .fw-bold.text-primary {
    color: #CD9CFF !important;
}

.alert-info {
    background-color: rgba(205, 156, 255, 0.1);
    border: none;
    color: #8a4cbf;
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
    background-color: #fff;
}

.form-control:focus {
    border-color: #CD9CFF;
    box-shadow: 0 0 0 0.25rem rgba(205, 156, 255, 0.15);
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
    background-color: #CD9CFF !important;
    border-color: #8a4cbf !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 13px 40px !important;
    border-radius: 50px !important;
    font-size: 16px !important;
    box-shadow: 0 8px 20px rgba(183, 109, 212, 0.5) !important;
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-primary:hover {
    background-color: #d7adff !important;
    border-color: #8a4cbf !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(183, 109, 212, 0.6) !important;
}

.btn-primary::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: all 0.5s ease;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
    padding: 13px 40px !important;
    border-radius: 50px !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3) !important;
}

.btn-secondary:hover {
    background-color: #5c636a;
    border-color: #565e64;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(108, 117, 125, 0.4) !important;
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
    color: #CD9CFF;
    font-size: 1.8rem;
    font-weight: bold;
    margin: 0;
}

.amount {
    color: #CD9CFF;
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
    background: rgba(245, 245, 250, 0.1);
    padding: 10px;
    border-radius: 10px;
    margin-top: 5px;
}

.countdown-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 45px;
    background: #ffffff;
    padding: 8px 5px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.countdown-item span:first-child {
    font-size: 1.2rem;
    font-weight: bold;
    color: #bb99ff;
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
    background: #CD9CFF;
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
    border-left: 3px solid #CD9CFF;
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
    // Đặt thời gian kết thúc là 24h ngày T+2 (2 ngày sau hiện tại)
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 2); // Ngày T+2
    endDate.setHours(23, 59, 59, 999); // Đặt thời gian 23:59:59

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

// Thêm hàm xác nhận thanh toán vào phần JavaScript
function confirmPayment() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const courseId = "{{ $course->id }}";
    const courseTitle = "{{ $course->title }}";
    const courseCode = "{{ $course->course_code }}";
    const amount = {{ $course->getCurrentPrice() }};
    const transferContent = document.getElementById('transferContent').textContent;

    // Hiển thị trạng thái đang xử lý
    const confirmBtn = document.getElementById('confirmPayment');
    confirmBtn.disabled = true;
    confirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';

    // Chuẩn bị dữ liệu gửi đi
    const webhookData = {
        data: {
            name: name,
            email: email,
            phone: phone,
            course_id: courseId,
            course_code: courseCode,
            course_title: courseTitle,
            amount: amount,
            transfer_content: transferContent,
            timestamp: new Date().toISOString()
        }
    };

    // Gửi request đến webhook
    fetch('https://mvp.xcel.bot/webhook-test/222e9e1e-a782-4b96-a077-15e7b1efaf49', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        mode: 'cors',
        body: JSON.stringify(webhookData)
    })
    .then(response => {
        // Hiển thị thông báo thành công bất kể response
        showSuccessMessage();
    })
    .catch(error => {
        console.error('Error:', error);
        // Vẫn hiển thị thông báo thành công ngay cả khi có lỗi
        showSuccessMessage();
    });
}

// Hàm hiển thị thông báo thành công
function showSuccessMessage() {
    // Ẩn nút xác nhận
    const confirmBtn = document.getElementById('confirmPayment');
    confirmBtn.style.display = 'none';

    // Đóng modal sau 3 giây
    setTimeout(function() {
        $('#enrollmentModal').modal('hide');

        // Hiển thị thông báo SweetAlert2
        Swal.fire({
            icon: 'success',
            title: 'Đăng ký thành công!',
            text: 'Vui lòng kiểm tra email của bạn.',
            confirmButtonColor: '#8a4cbf'
        });
    }, 3000);
}
</script>

@endsection
