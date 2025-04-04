@extends('layouts.client')

@section('title', $course->title)

@section('content')
<!-- Thêm meta CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Viewport meta tag for better mobile rendering -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!-- Include jQuery nếu chưa có -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Thêm thư viện QR Code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<!-- Thêm SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Loading Screen Overlay -->
<div id="loading-screen">
    <div class="loading-spinner">
        <i class="fas fa-spinner fa-spin"></i>
                        </div>
    <div class="loading-text">Đang tải...</div>
                        </div>

<style>
/* Loading screen styles */
#loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #1a103c 0%, #30164e 100%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
}

.loading-spinner {
    color: #bb99ff;
    font-size: 60px;
    animation: pulse 1.5s infinite ease-in-out;
    margin-bottom: 20px;
}

.loading-text {
    color: #ffffff;
    font-size: 18px;
    letter-spacing: 2px;
    animation: fadeInOut 1.5s infinite ease-in-out;
}

@keyframes fadeInOut {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

html, body {
    overflow-x: hidden;
    width: 100%;
    position: relative;
}

.course_details_area {
    padding: 80px 0 120px;
    background-color: #1a103c;
    background-image: linear-gradient(135deg, #1a103c 0%, #30164e 100%);
    background-attachment: fixed;
    min-height: 100vh;
    position: relative;
    padding-bottom: 30px !important;
}

.course_details_area::before {
    content: '';
    position: absolute;
    top: -150px;
    right: -150px;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(138, 76, 191, 0.2) 0%, rgba(26, 16, 60, 0) 70%);
    z-index: 0;
}

.course_details_area::after {
    content: '';
    position: absolute;
    bottom: -150px;
    left: -150px;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(138, 76, 191, 0.2) 0%, rgba(26, 16, 60, 0) 70%);
    z-index: 0;
}

.course-header {
    text-align: center;
    margin-bottom: 50px;
    padding: 40px;
    position: relative;
    z-index: 1;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    overflow: hidden;
    animation: fadeIn 0.8s ease-out;
}

.course-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(138, 76, 191, 0.1), rgba(233, 30, 99, 0.1), rgba(138, 76, 191, 0.1));
    z-index: -1;
    animation: gradientFlow 8s ease infinite;
    background-size: 200% 200%;
}

@keyframes gradientFlow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.course-title {
    font-size: 2.8rem;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 1.5rem;
    position: relative;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    background: linear-gradient(to right, #ffffff, #dfbcff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: inline-block;
}

.course-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(to right, #8a4cbf, #CD9CFF);
    border-radius: 3px;
}

.course-meta {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 2rem;
    flex-wrap: wrap;
}

.course-meta span {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    color: #e5e0ff;
    font-size: 1.1rem;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    padding: 12px 20px;
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.course-meta span:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.08);
}

.course-meta i {
    color: #bb99ff;
    font-size: 1.2rem;
}

.main_image {
    background: rgba(255, 255, 255, 0.03);
    padding: 20px;
    border-radius: 20px;
    margin-bottom: 40px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    border: 1px solid rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    position: relative;
    z-index: 1;
    transform: translateY(0);
    transition: all 0.4s ease;
    animation: fadeIn 1s ease-out;
    overflow: hidden;
}

.main_image::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.03), transparent);
    transform: rotate(45deg);
    animation: shine 3s infinite;
    z-index: 0;
}

@keyframes shine {
    0% {
        left: -50%;
        top: -50%;
    }
    100% {
        left: 150%;
        top: 150%;
    }
}

.main_image:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.25);
}

.course-thumbnail {
    max-width: 100%;
    width: 100%;
    height: auto;
    object-fit: cover;
    margin: 0 auto;
    display: block;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    position: relative;
    z-index: 1;
    transition: all 0.3s ease;
}

.course-thumbnail:hover {
    transform: scale(1.02);
}

.content_wrapper {
    margin-top: 50px;
    background: rgba(255, 255, 255, 0.98);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    max-width: 100%;
    animation: fadeIn 1.2s ease-out;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.5);
    margin-bottom: 30px;
}

.content_wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(to right, #8a4cbf, #CD9CFF);
    z-index: 1;
}

.content_wrapper .title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 25px;
    position: relative;
    display: inline-block;
    font-size: 1.8rem;
    padding-bottom: 10px;
}

.content_wrapper .title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: #CD9CFF;
    border-radius: 2px;
    transition: width 0.3s ease;
}

.content_wrapper .title:hover::after {
    width: 100%;
}

.content_wrapper .content {
    color: #333333;
    font-size: 16px;
    line-height: 1.8;
    font-family: 'Roboto', 'Segoe UI', 'Helvetica Neue', -apple-system, BlinkMacSystemFont, Arial, sans-serif;
    margin-bottom: 30px;
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
    margin-bottom: 15px;
}

.content_wrapper .content h2 {
    font-size: 1.6rem;
    font-weight: 600;
    margin-top: 30px;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(0,0,0,0.08);
}

.content_wrapper .content h3 {
    font-size: 1.4rem;
    font-weight: 600;
    margin-top: 25px;
    margin-bottom: 15px;
}

.content_wrapper .content ul {
    padding-left: 20px;
    margin-bottom: 20px;
}

.content_wrapper .content ul li {
    margin-bottom: 10px;
    position: relative;
    padding-left: 5px;
}

.content_wrapper .content a {
    color: #8a4cbf !important;
    text-decoration: none;
    border-bottom: 1px dotted #8a4cbf;
    transition: all 0.3s ease;
}

.content_wrapper .content a:hover {
    color: #CD9CFF !important;
    border-bottom: 1px solid #CD9CFF;
}

.content_wrapper .content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 20px 0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.content_wrapper .content blockquote {
    border-left: 4px solid #8a4cbf;
    padding: 15px 20px;
    background: rgba(138, 76, 191, 0.05);
    margin: 20px 0;
    border-radius: 0 8px 8px 0;
}

/* Lessons List Styling */
.lessons-list {
    margin-top: 30px;
}

.lesson-item {
    display: flex;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    margin-bottom: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.lesson-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.08);
    border-color: rgba(138, 76, 191, 0.3);
}

.lesson-number {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #8a4cbf 0%, #CD9CFF 100%);
    color: white;
    font-weight: bold;
    font-size: 1.5rem;
    min-width: 70px;
    padding: 30px 15px;
    position: relative;
    overflow: hidden;
}

.lesson-number::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    top: -100%;
    left: -100%;
    transform: rotate(45deg);
    transition: all 0.5s ease;
}

.lesson-item:hover .lesson-number::before {
    top: 100%;
    left: 100%;
}

.lesson-content {
    padding: 25px;
    flex: 1;
    overflow: visible;
}

.lesson-content h5 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 12px;
    transition: color 0.3s ease;
}

.lesson-item:hover .lesson-content h5 {
    color: #8a4cbf;
}

.lesson-content p {
    color: #6c757d;
    margin-bottom: 20px;
    line-height: 1.6;
}

.lesson-objectives {
    background: #f8f9fa;
    padding: 18px;
    border-radius: 10px;
    border-left: 4px solid #8a4cbf;
    transition: all 0.3s ease;
}

.lesson-objectives:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    background: #f3f4f6;
}

.lesson-objectives strong {
    color: #2c3e50;
    display: block;
    margin-bottom: 8px;
    font-size: 1.05rem;
}

.lesson-objectives p {
    margin-bottom: 0;
    font-size: 0.95rem;
}

/* Countdown styles */
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
    width: 100%;
}

.countdown {
    display: flex;
    gap: 10px;
    background: rgba(245, 245, 250, 0.1);
    padding: 10px;
    border-radius: 10px;
    margin-top: 5px;
    flex-wrap: wrap;
    justify-content: center;
    position: relative;
    z-index: 4;
}

.countdown-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-width: 45px;
    background: #ffffff;
    padding: 8px 5px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    margin: 2px;
    position: relative;
    z-index: 5; /* Ensure this has higher z-index */
}

.countdown-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
}

.countdown-item span:first-child {
    font-size: 1.2rem;
    font-weight: bold;
    color: #bb99ff;
    position: relative; /* Add position */
    z-index: 6; /* Add z-index to ensure text visibility */
}

.countdown-item .label {
    font-size: 0.7rem;
    color: #6c757d;
    text-transform: uppercase;
    position: relative; /* Add position */
    z-index: 6; /* Add z-index to ensure label visibility */
}

.slots-price-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
}

.original-price-small {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.6);
    text-decoration: line-through;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animated {
    animation: fadeIn 0.5s ease-out;
}

/* Modal Styles */
.modal-content {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
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
    color: #8a4cbf;
    margin: 20px 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.qr-code {
    max-width: 300px;
    width: 100%;
    height: auto;
    padding: 20px;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.qr-code:hover {
    transform: scale(1.02);
    box-shadow: 0 15px 30px rgba(0,0,0,0.12);
}

.bank-info {
    background-color: #f8f9fa;
    border-left: 4px solid #8a4cbf;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.bank-info:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transform: translateY(-2px);
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
    color: #8a4cbf !important;
}

.alert-info {
    background-color: rgba(187, 153, 255, 0.1);
    border: none;
    color: #8a4cbf;
    border-radius: 10px;
    padding: 15px 20px;
    margin: 20px 0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
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
    border-color: #bb99ff;
    box-shadow: 0 0 0 0.25rem rgba(187, 153, 255, 0.15);
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
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF) !important;
    border-color: #8a4cbf !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 13px 40px !important;
    border-radius: 50px !important;
    font-size: 16px !important;
    box-shadow: 0 8px 20px rgba(138, 76, 191, 0.5) !important;
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-primary:hover {
    background: linear-gradient(45deg, #9b59b6, #d7adff) !important;
    border-color: #8a4cbf !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(138, 76, 191, 0.6) !important;
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

/* Responsive Fixes */
@media (max-width: 1199px) {
    .course-title {
        font-size: 2.4rem;
    }

    .course-title:before {
        font-size: 2.4rem;
    }

    .content_wrapper {
        padding: 30px;
    }
}

@media (max-width: 991px) {
    .course_details_area {
        padding: 60px 0 150px;
    }

    .course-title {
        font-size: 2.2rem;
    }

    .course-title:before {
        font-size: 2.2rem;
    }

    .fixed-bottom-section .row {
    flex-direction: column;
        gap: 15px;
    }

    .fixed-bottom-section .col-lg-4 {
        width: 100%;
    margin-top: 10px;
}

    .enrollment-info {
        justify-content: center;
    }
}

@media (max-width: 767px) {
    .course_details_area {
        padding: 20px 0 60px; /* Reduced from 100px to match smaller fixed bottom */
    }

    .course-header {
        padding: 15px 10px;
        margin-bottom: 15px;
    }

    .course-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .course-title::after {
        width: 80px;
        bottom: -8px;
    }

    .course-meta {
        gap: 10px;
    }

    .course-meta span {
        padding: 8px 15px;
        font-size: 0.9rem;
        width: 100%; /* Full width on mobile */
        justify-content: center;
    }

    .main_image {
        padding: 10px;
        margin-bottom: 20px;
    }

    .content_wrapper {
        padding: 20px 15px;
        margin-top: 20px;
    }

    .content_wrapper .title {
        font-size: 1.4rem;
    }

    .lesson-item {
        flex-direction: column; /* Stack on mobile */
    }

    .lesson-number {
        width: 100%;
        padding: 12px 0;
        min-height: 50px;
    }

    .lesson-content {
        padding: 15px;
    }

    .lesson-content h5 {
        font-size: 1.1rem;
    }

    /* Enrollment Section on Mobile */
    .enrollment-section {
        padding: 15px;
    }

    .enrollment-section .row {
        flex-direction: column;
    }

    .enrollment-section .col-lg-4 {
        width: 100%;
        margin-bottom: 15px;
    display: flex;
        justify-content: center;
    }

    .price-info, .enrollment-info {
        width: 100%;
        align-items: center;
        text-align: center;
    }

    .price-wrapper {
        justify-content: center;
    }

    .enroll-btn {
        height: 44px; /* Minimum touch target */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Popup Banner Adjustments */
    .enrollment-popup {
        width: 95%; /* Wider on mobile */
        bottom: 10px;
        padding: 15px 10px;
    }

    .popup-content .row {
    flex-direction: column;
}

    .popup-content .col-lg-4 {
        width: 100%;
        margin-bottom: 10px;
    display: flex;
        justify-content: center;
    }

    .close-popup {
        width: 36px; /* Larger touch target */
        height: 36px;
        right: -5px;
        top: -15px;
    }

    /* Better Form Elements for Mobile */
    .form-control {
        height: 50px; /* Taller input fields */
        font-size: 16px; /* Prevent zoom on iOS */
    }

    .btn {
        min-height: 50px; /* Minimum touch target */
    }

    .fixed-bottom-section {
        padding: 4px 0; /* Even smaller on mobile */
    }

    .fixed-bottom-section .row {
        display: flex;
        align-items: center;
        margin: 0 -5px;
    }

    .fixed-bottom-section .col-md-4,
    .fixed-bottom-section .col-md-5,
    .fixed-bottom-section .col-md-3 {
        padding-left: 5px;
        padding-right: 5px;
        width: 33.333%;
    }

    .price-info, .countdown-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .price-wrapper {
        justify-content: center;
    }

    .price, .original-price {
        text-align: center;
}

.countdown-item {
        min-width: 22px; /* Smaller on mobile */
        padding: 0;
    }

    .countdown-item span:first-child {
        font-size: 10px;
        padding: 1px 0 0 0;
    }

    .countdown-item .label {
        font-size: 6px;
        padding-bottom: 1px;
    }

    .price {
        font-size: 14px;
        line-height: 1;
    }

    .original-price {
        font-size: 10px;
        display: block;
    }

    .enroll-btn {
        padding: 3px 8px;
        font-size: 11px;
        height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .countdown-item {
        min-width: 50px;
        padding: 5px;
        position: relative;
        z-index: 5;
    }

    .countdown-item span:first-child {
        font-size: 16px;
        position: relative;
        z-index: 6;
    }

    .countdown-item .label {
        font-size: 8px;
        position: relative;
        z-index: 6;
    }
}

/* Very small screens */
@media (max-width: 374px) {
    .countdown-item {
        min-width: 20px;
        position: relative;
        z-index: 5;
    }

    .countdown-item span:first-child {
        font-size: 9px;
        position: relative;
        z-index: 6;
    }

    .countdown-item .label {
        font-size: 5px;
        position: relative;
        z-index: 6;
    }

    .price {
        font-size: 12px;
    }

    .original-price {
        font-size: 9px;
    }

    .price-info .label,
    .countdown-info span {
        font-size: 8px;
    }

    .enroll-btn {
        font-size: 10px;
        padding: 3px 6px;
    }
}

@media (max-width: 575px) {
    .course_details_area {
        padding: 20px 0 70px; /* Adjusted to ensure content is visible */
    }

    .main_image {
        padding: 8px;
        margin-bottom: 20px;
    }

    /* Even smaller fixed-bottom for very small screens */
    .fixed-bottom-section {
        padding: 4px 0;
    }

    .countdown {
        gap: 2px;
    }

    .countdown-item {
        min-width: 25px;
        padding: 1px;
    }
}

/* Force viewport adjustments for mobile */
@media (max-width: 320px) {
    body {
        min-width: 320px;
        overflow-x: hidden;
    }

    .course-title {
        font-size: 1.4rem;
    }
}

/* Fix for modal on small screens */
@media (max-width: 400px) {
    .modal-dialog {
        margin: 0.5rem;
    }

    .modal-body {
        padding: 1rem;
    }

    .qr-code {
        padding: 10px;
    }
}

/* Replace the fixed-bottom section with beautiful bottom section */
.fixed-bottom-section {
    display: none; /* Hide the fixed bottom section */
}

.bottom-enrollment-section {
    padding: 30px 0;
    background: linear-gradient(135deg, #120a2e 0%, #1f1147 100%);
    margin-top: 40px;
    position: relative;
    overflow: hidden;
}

.bottom-enrollment-section::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(138, 76, 191, 0.2) 0%, rgba(26, 16, 60, 0) 70%);
    z-index: 0;
}

.bottom-enrollment-section::after {
    content: '';
    position: absolute;
    bottom: -100px;
    left: -100px;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(138, 76, 191, 0.2) 0%, rgba(26, 16, 60, 0) 70%);
    z-index: 0;
}

.enrollment-card {
    position: relative;
    z-index: 5;
    max-width: 1000px;
    margin: 0 auto;
}

.enrollment-card-inner {
    position: relative;
    background: rgba(32, 17, 63, 0.7);
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.5s ease;
}

.enrollment-card-inner:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
}

.enrollment-card-inner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(138, 76, 191, 0.1), rgba(233, 30, 99, 0.1), rgba(138, 76, 191, 0.1));
    z-index: -1;
    animation: gradientFlow 8s ease infinite;
    background-size: 200% 200%;
}

.enrollment-card-content {
    padding: 30px;
    position: relative;
    z-index: 2;
}

.price-info .label {
    color: #ffffff;
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.9;
}

.price {
    font-size: 28px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
    background: linear-gradient(to right, #ffffff, #bb99ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.original-price {
    color: #ff6b6b;
    font-size: 16px;
    text-decoration: line-through;
    margin-left: 8px;
    opacity: 0.8;
}

.countdown-info {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.countdown-info span {
    font-size: 14px;
    color: #ffffff;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.9;
}

.countdown {
    display: flex;
    gap: 6px;
}

.countdown-item {
    background: linear-gradient(135deg, #594896 0%, #7054ba 100%);
    min-width: 60px;
    padding: 8px 5px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.countdown-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.countdown-item span:first-child {
    font-size: 20px;
    font-weight: bold;
    color: #00ffcc;
    text-shadow: 0 0 10px rgba(0, 255, 204, 0.5);
}

.countdown-item:hover span:first-child {
    color: #ffffff;
}

.countdown-info .countdown-item span:first-child {
    font-size: 22px;
    color: #00ffcc;
    text-shadow: 0 0 15px rgba(0, 255, 204, 0.7);
    font-weight: 800;
}

/* Add pulse animation when seconds change */
@keyframes numberPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

#seconds-bottom, #seconds-popup {
    animation: numberPulse 1s infinite;
}

.countdown-item .label {
    font-size: 10px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
    margin-top: 3px;
}

/* Updated button animations */
.animated-btn {
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF);
    color: #ffffff;
    border: none;
    border-radius: 50px;
    padding: 12px 30px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 1;
    animation: pulse-glow 2s infinite;
}

.animated-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: all 0.5s ease;
    z-index: -1;
    animation: btn-shine 3s infinite;
}

@keyframes btn-shine {
    0% {
        left: -100%;
        opacity: 0.7;
    }
    20% {
        left: 100%;
        opacity: 0.9;
    }
    100% {
        left: 100%;
        opacity: 0.7;
    }
}

@keyframes pulse-glow {
    0% {
        box-shadow: 0 8px 20px rgba(138, 76, 191, 0.3);
        transform: scale(1);
    }
    50% {
        box-shadow: 0 8px 25px rgba(138, 76, 191, 0.6);
        transform: scale(1.03);
    }
    100% {
        box-shadow: 0 8px 20px rgba(138, 76, 191, 0.3);
        transform: scale(1);
    }
}

.animated-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(138, 76, 191, 0.7);
    background: linear-gradient(45deg, #9b59b6, #d7adff);
}

/* Register button in popup */
.register-button {
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    letter-spacing: 1px;
    margin-top: 10px;
    position: relative;
    overflow: hidden;
    animation: pulse-glow 2s infinite;
}

.register-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: all 0.5s ease;
    animation: btn-shine 3s infinite;
}

.register-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    background: linear-gradient(45deg, #9b59b6, #d7adff);
}

/* Remove outdated bounce animation */
.animated-btn {
    animation: pulse-glow 2s infinite;
}

/* Modal buttons animation */
.btn-primary {
    position: relative;
    overflow: hidden;
    animation: pulse-subtle 3s infinite;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.5s ease;
    animation: btn-shine 4s infinite;
}

@keyframes pulse-subtle {
    0% {
        box-shadow: 0 8px 20px rgba(138, 76, 191, 0.3);
    }
    50% {
        box-shadow: 0 8px 25px rgba(138, 76, 191, 0.5);
    }
    100% {
        box-shadow: 0 8px 20px rgba(138, 76, 191, 0.3);
    }
}

/* Glowing effect for buttons on hover */
.animated-btn:hover, .register-button:hover, .btn-primary:hover {
    animation: none;
    background: linear-gradient(45deg, #9b59b6, #d7adff);
    box-shadow: 0 0 20px rgba(138, 76, 191, 0.8);
    transition: all 0.3s ease;
}

/* Text animations */
.animate-text {
    animation: fadeInUp 1s ease forwards;
    opacity: 0;
}

.shine-text {
    position: relative;
    animation: textShine 3s infinite;
}

@keyframes textShine {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes shine {
    0% {
        left: -100%;
    }
    20% {
        left: 100%;
    }
    100% {
        left: 100%;
    }
}

/* Mobile responsiveness */
@media (max-width: 767px) {
    .bottom-enrollment-section {
        padding: 20px 0;
    }

    .enrollment-card-content {
        padding: 20px 15px;
    }

    .enrollment-card-inner .row {
    display: flex;
        flex-direction: column;
        text-align: center;
    }

    .enrollment-card-inner .col-md-4,
    .enrollment-card-inner .col-md-5,
    .enrollment-card-inner .col-md-3 {
        width: 100%;
        margin-bottom: 15px;
    }

    .price-info, .countdown-info {
    align-items: center;
    }

    .price-wrapper {
    justify-content: center;
        display: flex;
        align-items: center;
    }

    .countdown-item {
        min-width: 22px; /* Smaller on mobile */
        padding: 0;
        position: relative;
        z-index: 5;
    }

    .countdown-item span:first-child {
        font-size: 10px;
        padding: 1px 0 0 0;
        z-index: 6;
        position: relative;
    }

    .animated-btn {
        padding: 10px 20px;
        font-size: 14px;
    }
}

@media (max-width: 380px) {
    .countdown-item {
        min-width: 42px;
        padding: 4px;
    }

    .countdown-item span:first-child {
        font-size: 14px;
    }

    .countdown-item .label {
        font-size: 7px;
    }

    .price {
        font-size: 22px;
    }
}

/* Add pulse animation for text elements */
@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.9;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.pulse {
    animation: pulse 0.6s ease;
}

/* Add a glowing effect for countdown items */
@keyframes glow {
    0% {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    50% {
        box-shadow: 0 5px 30px rgba(138, 76, 191, 0.5);
    }
    100% {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
}

.countdown-item {
    animation: glow 3s infinite alternate;
}

/* Add a subtle bounce effect for the button */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
}

.animated-btn {
    animation: bounce 4s infinite ease-in-out;
}

/* Course Promo Popup improved styles */
.course-promo-popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    max-width: 90%;
    background: linear-gradient(135deg, #9b4dca 0%, #7e3aa3 100%);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    z-index: 9999;
    padding: 40px 30px;
    text-align: center;
    color: white;
    animation: fadeIn 0.5s ease;
    display: none;
}

.popup-close {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: rgba(255, 255, 255, 0.8);
    transition: color 0.3s;
}

.popup-close:hover {
    color: white;
}

.course-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 50px;
    padding: 8px 25px;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 20px;
    letter-spacing: 1px;
}

.course-title-popup {
    font-size: 32px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.price-section {
    margin-bottom: 30px;
}

.price-label {
    font-size: 16px;
    margin-bottom: 10px;
    opacity: 0.9;
}

.price-amount {
    font-size: 30px;
    font-weight: 700;
    color: #00ffcc;
    background: rgba(0, 255, 204, 0.2);
    display: inline-block;
    padding: 5px 20px;
    border-radius: 8px;
    margin-bottom: 10px;
}

.original-price-popup {
    font-size: 18px;
    text-decoration: line-through;
    opacity: 0.7;
    margin-bottom: 10px;
}

.promo-period {
    font-size: 14px;
    font-style: italic;
    opacity: 0.8;
}

.register-button {
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    letter-spacing: 1px;
    margin-top: 10px;
    position: relative;
    overflow: hidden;
    animation: pulse-glow 2s infinite;
}

.register-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: all 0.5s ease;
    animation: btn-shine 3s infinite;
}

.register-button:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    background: linear-gradient(45deg, #9b59b6, #d7adff);
}

@media (max-width: 576px) {
    .course-promo-popup {
        padding: 30px 20px;
    }

    .course-title-popup {
        font-size: 24px;
    }

    .price-amount {
        font-size: 26px;
    }

    .register-button {
        padding: 12px 30px;
        font-size: 14px;
    }
}

/* End date info styles */
.end-date-info {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.8);
    margin-top: 5px;
    font-style: italic;
}

.end-date {
    font-weight: 600;
    color: #00ffcc;
}

.countdown-info .end-date-info {
    margin-top: 10px;
    font-size: 15px;
    color: #ffffff;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.1);
    padding: 5px 10px;
    border-radius: 20px;
    display: inline-block;
}

.countdown-info .end-date {
    font-weight: 700;
    color: #00ffcc;
    text-shadow: 0 0 10px rgba(0, 255, 204, 0.5);
    font-size: 16px;
}

@media (max-width: 767px) {
    .end-date-info {
        font-size: 12px;
        text-align: center;
    }
}

.countdown-info .countdown {
    margin-top: 15px;
    gap: 10px;
    position: relative;
    z-index: 4;
}

.countdown-info .countdown-item {
    background: linear-gradient(135deg, #321b65 0%, #4a2b96 100%);
    min-width: 65px;
    padding: 10px 8px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    z-index: 11;
}

.countdown-info .countdown-item span:first-child {
    font-size: 36px;
    color: #ffffff;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    font-weight: 800;
    display: block;
    margin-bottom: 5px;
    background: linear-gradient(135deg, #ff7e00, #ffcc00);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    z-index: 12;
}

/* Make countdown digits glow */
@keyframes countdownGlow {
    0% { text-shadow: 0 0 10px rgba(255, 255, 255, 0.7); }
    50% { text-shadow: 0 0 20px rgba(255, 255, 255, 1); }
    100% { text-shadow: 0 0 10px rgba(255, 255, 255, 0.7); }
}

.countdown-info .countdown-item span:first-child {
    animation: countdownGlow 2s infinite;
}

/* Make sure the countdown is visible on all screens */
@media (max-width: 767px) {
    .countdown-info .countdown-item {
        min-width: 50px;
        padding: 8px 5px;
    }

    .countdown-info .countdown-item span:first-child {
        font-size: 20px;
    }

    .countdown-info .countdown-item .label {
        font-size: 10px;
    }
}

.fixed-bottom-section .countdown-item {
    min-width: 25px;
    padding: 1px;
    position: relative;
    z-index: 5;
}

.fixed-bottom-section .countdown-item span:first-child {
    font-size: 12px;
    position: relative;
    z-index: 6;
}

.fixed-bottom-section .countdown-item .label {
    font-size: 8px;
    position: relative;
    z-index: 6;
}

/* Fix for bottom enrollment section countdown */
.countdown-info .countdown {
    display: flex;
    gap: 10px;
    position: relative;
    z-index: 10;
}

.countdown-info .countdown-item {
    background: linear-gradient(135deg, #321b65 0%, #4a2b96 100%);
    min-width: 65px;
    padding: 10px 8px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    z-index: 11;
}

.countdown-info .countdown-item span:first-child {
    font-size: 36px;
    color: #ffffff;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    font-weight: 800;
    display: block;
    margin-bottom: 5px;
    background: linear-gradient(135deg, #ff7e00, #ffcc00);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    z-index: 12;
}

/* Fixed popup countdown styles */
#countdown-popup {
    position: relative;
    z-index: 10000; /* Very high z-index */
    display: flex !important;
    visibility: visible !important;
    opacity: 1 !important;
}

#countdown-popup .countdown-item,
#countdown-popup .countdown-item span,
#countdown-popup .countdown-item .label {
    visibility: visible !important;
    opacity: 1 !important;
}

/* Fix for mobile countdown */
@media (max-width: 767px) {
    .countdown-item {
        min-width: 50px;
        padding: 8px 5px;
        position: relative;
        z-index: 5;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .countdown-item span:first-child {
        font-size: 20px;
        position: relative;
        z-index: 6;
        visibility: visible !important;
        opacity: 1 !important;
    }

    .countdown-item .label {
        font-size: 10px;
        position: relative;
        z-index: 6;
        visibility: visible !important;
        opacity: 1 !important;
    }
}

/* Additional countdown visibility fixes */
.countdown {
    display: flex !important;
    visibility: visible !important;
    opacity: 1 !important;
    position: relative !important;
    z-index: 100 !important;
    justify-content: center !important;
    align-items: center !important;
    gap: 8px !important;
    margin: 10px auto !important;
    background: rgba(0, 0, 0, 0.1) !important;
    padding: 10px !important;
    border-radius: 10px !important;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
    width: fit-content !important;
}

.countdown-item {
    min-width: 60px !important;
    height: auto !important;
    padding: 10px 8px !important;
    background: rgba(26, 16, 60, 0.9) !important;
    color: #FFFFFF !important;
    border-radius: 8px !important;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3) !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    visibility: visible !important;
    opacity: 1 !important;
    z-index: 101 !important;
    position: relative !important;
    text-align: center !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    margin: 0 5px !important;
}

.countdown-item span:first-child {
    font-size: 24px !important;
    font-weight: bold !important;
    color: #8a4cbf !important;
    visibility: visible !important;
    opacity: 1 !important;
    display: block !important;
    z-index: 102 !important;
    position: relative !important;
}

.countdown-item .label {
    font-size: 12px !important;
    color: rgba(255, 255, 255, 0.9) !important;
    text-transform: uppercase !important;
    visibility: visible !important;
    opacity: 1 !important;
    display: block !important;
    z-index: 102 !important;
    position: relative !important;
    font-weight: 600 !important;
    letter-spacing: 1px !important;
}

@media (max-width: 767px) {
    .countdown-item {
        min-width: 45px !important;
        padding: 6px 4px !important;
    }

    .countdown-item span:first-child {
        font-size: 18px !important;
    }

    .countdown-item .label {
        font-size: 9px !important;
    }

    .countdown-info .label,
    .countdown-wrapper .label {
        font-size: 12px !important;
        margin-bottom: 5px !important;
    }

    .countdown {
        gap: 5px !important;
    }
}

@media (max-width: 380px) {
    .countdown-item {
        min-width: 35px !important;
        padding: 4px 2px !important;
    }

    .countdown-item span:first-child {
        font-size: 16px !important;
    }

    .countdown-item .label {
        font-size: 7px !important;
    }
}

.countdown-highlight {
    background: transparent !important;
}

.countdown-highlight .countdown-item {
    margin: 5px;
}

.countdown-highlight .countdown-item span:first-child {
    font-size: 1.2rem;
    font-weight: bold;
    color: #ffffff;
}

.countdown-highlight .countdown-item .label {
    font-size: 0.7rem;
    color: #ffffff;
    text-transform: uppercase;
}

/* Countdown color override to match design */
.countdown-item {
    background-color: #FFFFFF !important;
    border-radius: 8px !important;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15) !important;
    margin: 0 5px !important;
}

.countdown-item span:first-child {
    color: #FFB347 !important;
    font-size: 28px !important;
    font-weight: 700 !important;
    -webkit-text-fill-color: #FFB347 !important;
    background: none !important;
    text-shadow: none !important;
}

.countdown-item .label {
    color: #333333 !important;
    font-size: 12px !important;
    font-weight: 500 !important;
    text-transform: uppercase !important;
}

.countdown-highlight {
    background: rgba(26, 16, 60, 0.3) !important;
    border-radius: 15px !important;
    padding: 10px 15px !important;
}

.countdown-info .countdown-item,
#countdown-popup .countdown-item,
.bottom-enrollment-section .countdown-item {
    background: rgba(26, 16, 60, 0.9) !important;
}

.countdown-info .countdown-item span:first-child,
#countdown-popup .countdown-item span:first-child,
.bottom-enrollment-section .countdown-item span:first-child {
    color: #FFB347 !important;
    -webkit-text-fill-color: #FFB347 !important;
    background: none !important;
}

.countdown-info .countdown-item .label,
#countdown-popup .countdown-item .label,
.bottom-enrollment-section .countdown-item .label {
    color: #333333 !important;
}

@media (max-width: 767px) {
    .countdown-item span:first-child {
        font-size: 22px !important;
    }

    .countdown-item .label {
        font-size: 10px !important;
    }
}

/* Price styling to match new design */
.price-info {
    background: rgba(26, 16, 60, 0.5);
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.price-info .label {
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.price-wrapper {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    gap: 10px;
}

.price {
    font-size: 32px !important;
    font-weight: 800 !important;
    color: #ffffff !important;
    margin: 0 !important;
    line-height: 1.2 !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3) !important;
}

.original-price {
    color: #FF6B6B !important;
    font-size: 18px !important;
    text-decoration: line-through !important;
    font-weight: 500 !important;
    margin: 0 !important;
    opacity: 0.9 !important;
}

.end-date-info {
    font-size: 14px !important;
    color: rgba(255, 255, 255, 0.7) !important;
    margin-top: 8px !important;
    font-style: italic !important;
}

.end-date {
    color: #06D6A0 !important;
    font-weight: 600 !important;
}

@media (max-width: 767px) {
    .price {
        font-size: 28px !important;
    }

    .original-price {
        font-size: 16px !important;
    }
}

/* Bottom enrollment section price */
.bottom-enrollment-section .price-info {
    background: rgba(26, 16, 60, 0.5);
    padding: 15px;
    border-radius: 8px;
}

.bottom-enrollment-section .price-info .label {
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.bottom-enrollment-section .price-wrapper {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    gap: 10px;
}

.bottom-enrollment-section .price {
    font-size: 32px;
    font-weight: 800;
    color: #ffffff;
    margin: 0;
    line-height: 1.2;
}

.bottom-enrollment-section .original-price {
    color: #FF6B6B;
    font-size: 18px;
    text-decoration: line-through;
    font-weight: 500;
    margin: 0;
}

/* Popup price styling */
#enrollmentPopup .price-info {
    background: rgba(26, 16, 60, 0.5);
    padding: 12px;
    border-radius: 8px;
}

#enrollmentPopup .price-wrapper {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    gap: 8px;
}

#enrollmentPopup .price {
    font-size: 26px;
}

#enrollmentPopup .original-price {
    font-size: 16px;
}

/* Price animation effects */
@keyframes priceShine {
    0% {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    }
    50% {
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
    }
    100% {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    }
}

.price, .price-amount {
    animation: priceShine 3s infinite;
}

@keyframes strikeFlash {
    0%, 100% {
        opacity: 0.7;
    }
    50% {
        opacity: 1;
    }
}

.original-price, .original-price-popup {
    animation: strikeFlash 4s infinite;
    position: relative;
}

.original-price::after, .original-price-popup::after {
    content: "";
    position: absolute;
    left: 0;
    top: 50%;
    width: 0;
    height: 2px;
    background-color: #FF6B6B;
    animation: strikeThrough 1s forwards;
}

@keyframes strikeThrough {
    0% {
        width: 0;
    }
    100% {
        width: 100%;
    }
}

/* Hover effects for price sections */
.price-info:hover .price,
.price-section:hover .price-amount {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

.price-info, .price-section {
    transition: all 0.3s ease;
}

.price-info:hover, .price-section:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.countdown-item span:first-child {
    color: #FFFFFF !important;
    font-size: 28px !important;
    font-weight: 700 !important;
    -webkit-text-fill-color: #FFFFFF !important;
    background: none !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3) !important;
}

.countdown-info .countdown-item span:first-child,
#countdown-popup .countdown-item span:first-child,
.bottom-enrollment-section .countdown-item span:first-child {
    color: #FFFFFF !important;
    -webkit-text-fill-color: #FFFFFF !important;
    background: none !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3) !important;
    animation: priceShine 3s infinite !important;
}

/* Price animation effects */
@keyframes priceShine {
    0% {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    }
    50% {
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
    }
    100% {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    }
}

.price, .price-amount, .countdown-item span:first-child {
    animation: priceShine 3s infinite;
}

/* Replace all countdown color styles with this unified version */
.countdown-item span:first-child {
    color: #FFFFFF !important;
    font-size: 28px !important;
    font-weight: 800 !important;
    -webkit-text-fill-color: #FFFFFF !important;
    background: none !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3) !important;
    margin: 0 !important;
    line-height: 1.2 !important;
    animation: priceShine 3s infinite !important;
}

/* Override any previous styles with !important */
.countdown-info .countdown-item span:first-child,
#countdown-popup .countdown-item span:first-child,
.bottom-enrollment-section .countdown-item span:first-child,
.countdown-highlight .countdown-item span:first-child {
    color: #FFFFFF !important;
    -webkit-text-fill-color: #FFFFFF !important;
    background: none !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3) !important;
    animation: priceShine 3s infinite !important;
    background-clip: unset !important;
}

/* Make sure we're not duplicating animations */
.price, .price-amount, .countdown-item span:first-child {
    animation: priceShine 3s infinite;
}

/* Remove other countdown text effect animations that conflict */
.countdown-info .countdown-item span:first-child {
    animation: priceShine 3s infinite !important;
    background: none !important;
    -webkit-background-clip: unset !important;
}

/* Make labels darker for better contrast with white numbers */
.countdown-item .label {
    color: #1a103c !important;
    font-weight: 600 !important;
}

/* Update countdown color to match the purplish-white shade from the image */
.countdown-item span:first-child {
    color: #CFCAD6 !important;
    font-size: 28px !important;
    font-weight: 800 !important;
    -webkit-text-fill-color: #CFCAD6 !important;
    background: none !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2) !important;
    margin: 0 !important;
    line-height: 1.2 !important;
    animation: purpleShine 3s infinite !important;
}

/* Override all countdown number colors to ensure consistency */
.countdown-info .countdown-item span:first-child,
#countdown-popup .countdown-item span:first-child,
.bottom-enrollment-section .countdown-item span:first-child,
.countdown-highlight .countdown-item span:first-child {
    color: #CFCAD6 !important;
    -webkit-text-fill-color: #CFCAD6 !important;
    background: none !important;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2) !important;
    animation: purpleShine 3s infinite !important;
    background-clip: unset !important;
}

/* Create a new animation specific to the purplish glow */
@keyframes purpleShine {
    0% {
        text-shadow: 0 0 5px rgba(207, 202, 214, 0.4);
    }
    50% {
        text-shadow: 0 0 10px rgba(207, 202, 214, 0.7);
    }
    100% {
        text-shadow: 0 0 5px rgba(207, 202, 214, 0.4);
    }
}

/* Apply the same purplish shine to price as well for consistency */
.price, .price-amount {
    color: #CFCAD6 !important;
    -webkit-text-fill-color: #CFCAD6 !important;
    animation: purpleShine 3s infinite !important;
}

/* Countdown container - transparent background to match overall design */
.countdown-highlight {
    background: transparent !important;
    box-shadow: none !important;
    border: none !important;
    padding: 5px !important;
}

/* Countdown item - dark purple background to match price display */
.countdown-highlight .countdown-item {
    background: rgba(26, 16, 60, 0.9) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    margin: 0 3px !important;
}

/* Override existing styles to ensure consistency */
.countdown {
    background: transparent !important;
    box-shadow: none !important;
    padding: 0 !important;
}

/* Ensure countdown numbers are properly colored */
.countdown-highlight .countdown-item span:first-child {
    color: #CFCAD6 !important;
    -webkit-text-fill-color: #CFCAD6 !important;
}

/* Also update text colors for better contrast */
.countdown-item .label {
    color: rgba(255, 255, 255, 0.9) !important;
}

/* Make the countdown labels match the number color */
.countdown-item .label {
    color: #CFCAD6 !important;
    font-size: 12px !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    visibility: visible !important;
    opacity: 1 !important;
    display: block !important;
    z-index: 102 !important;
    position: relative !important;
    letter-spacing: 1px !important;
    margin-top: 2px !important;
}

/* Ensure all countdown labels have the same style */
.countdown-info .countdown-item .label,
#countdown-popup .countdown-item .label,
.bottom-enrollment-section .countdown-item .label,
.countdown-highlight .countdown-item .label {
    color: #CFCAD6 !important;
    -webkit-text-fill-color: #CFCAD6 !important;
}

/* Adjust mobile styles to keep the same color */
@media (max-width: 767px) {
    .countdown-item .label {
        color: #CFCAD6 !important;
        -webkit-text-fill-color: #CFCAD6 !important;
    }
}

/* Text animations */
.animate-text {
    animation: fadeInUp 1s ease forwards;
    opacity: 0;
}

/* Add stunning animation for "KẾT THÚC SAU" text */
.countdown-info .label.animate-text,
.countdown-wrapper .label {
    position: relative;
    display: inline-block;
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 1.1rem;
    text-transform: uppercase;
    margin-bottom: 12px;
    animation: gradientText 2s ease infinite, fadeInUp 1s ease forwards;
    background-size: 200% auto;
    text-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 5px 0;
}

.countdown-info .label.animate-text::after,
.countdown-wrapper .label::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    animation: widthPulse 2s ease-in-out infinite;
    border-radius: 2px;
}

.countdown-info .label.animate-text::before,
.countdown-wrapper .label::before {
    content: '⏱️';
    position: absolute;
    left: -25px;
    animation: clockPulse 1s ease-in-out infinite;
}

/* Special style for HỌC PHÍ label */
.price-info .label.animate-text {
    position: relative;
    display: inline-block;
    background: linear-gradient(to right, #8a4cbf, #CD9CFF);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    letter-spacing: 1px;
    font-size: 1.1rem;
    text-transform: uppercase;
    margin-bottom: 12px;
    animation: fadeInUp 1s ease forwards;
    text-shadow: 0 5px 15px rgba(0,0,0,0.1);
    padding: 5px 0;
}

.price-info .label.animate-text::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, #8a4cbf, #CD9CFF);
    animation: widthPulse 2s ease-in-out infinite;
    border-radius: 2px;
}

@keyframes textShine {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes gradientText {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes widthPulse {
    0%, 100% {
        width: 0%;
        opacity: 0.5;
    }
    50% {
        width: 100%;
        opacity: 1;
    }
}

@keyframes clockPulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Referral code field styling */
.modal-body #referral_code {
    border: 1px solid rgba(138, 76, 191, 0.2);
    transition: all 0.3s ease;
    background-color: #fcfaff;
    border-radius: 8px;
}

.modal-body #referral_code:focus {
    border-color: #8a4cbf;
    box-shadow: 0 0 0 3px rgba(138, 76, 191, 0.15);
    background-color: #fff;
}

.modal-body #referral_code::placeholder {
    color: #b3b3b3;
    font-style: italic;
    font-size: 0.9em;
}

.modal-body .form-label small.text-muted {
    font-size: 0.8em;
    opacity: 0.8;
    font-style: italic;
}

/* Existing styles continue below */

/* Enhanced Form Styling - Start */
#enrollmentModal .modal-content {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
    background: linear-gradient(to bottom, #ffffff, #fcfaff);
}

#enrollmentModal .modal-header {
    background: linear-gradient(135deg, #9b4dca 0%, #7e3aa3 100%);
    border-bottom: none;
    padding: 20px 25px;
    position: relative;
}

#enrollmentModal .modal-title {
    color: white;
    font-weight: 700;
    font-size: 1.3rem;
    font-family: 'Be Vietnam Pro', sans-serif;
    margin: 0;
    position: relative;
    padding-left: 30px;
}

#enrollmentModal .modal-title::before {
    content: '\f007';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    left: 0;
    top: 1px;
    color: rgba(255, 255, 255, 0.8);
}

#enrollmentModal .modal-header .btn-close {
    color: white;
    opacity: 0.8;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    padding: 8px;
}

#enrollmentModal .modal-header .btn-close:hover {
    opacity: 1;
    transform: rotate(90deg);
    background: rgba(255, 255, 255, 0.3);
}

#enrollmentModal .modal-body {
    padding: 30px;
    position: relative;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236a4c93' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
}

#registrationForm {
    position: relative;
    overflow: hidden;
}

#registrationForm::before {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(224, 162, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
    border-radius: 50%;
    z-index: 0;
}

#registrationForm::after {
    content: '';
    position: absolute;
    bottom: -50px;
    left: -50px;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(255, 205, 74, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
    border-radius: 50%;
    z-index: 0;
}

#registrationForm .form-label {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    font-weight: 600;
    color: #1a103c;
    font-size: 0.95rem;
    font-family: 'Be Vietnam Pro', sans-serif;
    transition: all 0.3s ease;
    position: relative;
}

#registrationForm .form-label small.text-muted {
    font-weight: 400;
    font-size: 0.8rem;
    opacity: 0.7;
    font-style: italic;
    margin-left: 5px;
}

#registrationForm .mb-3 {
    position: relative;
    margin-bottom: 20px !important;
}

#registrationForm .mb-3::before {
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    left: 15px;
    top: 42px;
    font-size: 16px;
    color: #8a4cbf;
    z-index: 10;
    opacity: 0.7;
    transition: all 0.3s ease;
}

#registrationForm .mb-3:nth-child(1)::before {
    content: '\f007'; /* User icon */
}

#registrationForm .mb-3:nth-child(2)::before {
    content: '\f0e0'; /* Envelope icon */
}

#registrationForm .mb-3:nth-child(3)::before {
    content: '\f095'; /* Phone icon */
}

#registrationForm .mb-3:nth-child(4)::before {
    content: '\f02b'; /* Tag icon */
}

#registrationForm .mb-3:hover::before {
    color: #9b4dca;
    opacity: 1;
}

#registrationForm .form-control {
    height: 52px;
    border-radius: 12px;
    border: 2px solid rgba(138, 76, 191, 0.1);
    padding: 10px 15px 10px 45px;
    font-size: 1rem;
    color: #1a103c;
    background-color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
    font-family: 'Be Vietnam Pro', sans-serif;
    position: relative;
    z-index: 2;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
}

#registrationForm .form-control:focus {
    outline: none;
    border-color: #8a4cbf;
    box-shadow: 0 0 0 4px rgba(138, 76, 191, 0.1);
    background-color: #fff;
}

#registrationForm .form-control::placeholder {
    color: #b3b3b3;
    opacity: 0.7;
    font-style: italic;
    font-size: 0.9rem;
}

/* Button styles */
#registrationForm .text-center .btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 14px 30px !important;
    background: linear-gradient(135deg, #9b4dca 0%, #7e3aa3 100%) !important;
    border: none !important;
    border-radius: 50px !important;
    color: white !important;
    font-weight: 600 !important;
    font-size: 1rem !important;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(155, 77, 202, 0.4) !important;
    font-family: 'Be Vietnam Pro', sans-serif;
    min-width: 220px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

#registrationForm .text-center .btn-primary::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.5s ease;
}

#registrationForm .text-center .btn-primary:hover::before {
    left: 100%;
}

#registrationForm .text-center .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(155, 77, 202, 0.5) !important;
    background: linear-gradient(135deg, #8a4cbf 0%, #6e33a3 100%) !important;
}

#registrationForm .text-center .btn-primary::after {
    content: '\f061'; /* Arrow right icon */
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    margin-left: 10px;
    transition: transform 0.3s ease;
    display: inline-block;
}

#registrationForm .text-center .btn-primary:hover::after {
    transform: translateX(5px);
}

/* Animation for form elements */
@keyframes formFadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

#registrationForm .mb-3 {
    animation: formFadeInUp 0.5s ease forwards;
    opacity: 0;
}

#registrationForm .mb-3:nth-child(1) {
    animation-delay: 0.1s;
}

#registrationForm .mb-3:nth-child(2) {
    animation-delay: 0.2s;
}

#registrationForm .mb-3:nth-child(3) {
    animation-delay: 0.3s;
}

#registrationForm .mb-3:nth-child(4) {
    animation-delay: 0.4s;
}

#registrationForm .text-center {
    animation: formFadeInUp 0.5s ease forwards;
    animation-delay: 0.5s;
    opacity: 0;
}

/* Shiny input effect */
@keyframes inputShine {
    0% {
        background-position: -100px;
    }
    40%, 100% {
        background-position: 320px;
    }
}

#registrationForm .form-control:focus {
    background-image: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%);
    background-size: 200px 100%;
    background-repeat: no-repeat;
    background-position: -100px;
    animation: inputShine 1.5s infinite;
}

/* Payment info styling */
#paymentInfo {
    opacity: 0;
    animation: formFadeInUp 0.5s ease forwards;
}

#paymentInfo .qr-container {
    position: relative;
    padding: 15px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 2px dashed rgba(138, 76, 191, 0.2);
    transition: all 0.3s ease;
}

#paymentInfo .qr-container:hover {
    border-color: rgba(138, 76, 191, 0.4);
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

#paymentInfo .qr-code {
    max-width: 200px;
    height: auto;
    display: block;
    margin: 0 auto;
    transition: transform 0.3s ease;
}

#paymentInfo .qr-code:hover {
    transform: scale(1.05);
}

#paymentInfo .bank-info {
    border-radius: 12px;
    border-left: 4px solid #8a4cbf;
    transition: all 0.3s ease;
}

#paymentInfo .bank-info:hover {
    background-color: #f8f6ff !important;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

#paymentInfo .amount {
    font-size: 1.8rem;
    font-weight: 700;
    color: #8a4cbf;
    display: block;
    background: linear-gradient(to right, #8a4cbf, #CD9CFF);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 15px;
}

#paymentInfo .text-primary {
    color: #8a4cbf !important;
}

#paymentInfo .original-price {
    color: #999;
    font-size: 1rem;
    text-decoration: line-through;
    margin-bottom: 5px;
    display: block;
}

#paymentInfo .alert-info {
    background-color: rgba(138, 76, 191, 0.1);
    border: none;
    border-radius: 12px;
    color: #1a103c;
    border-left: 4px solid rgba(138, 76, 191, 0.5);
}

#paymentInfo .fa-info-circle {
    color: #8a4cbf;
}

#paymentInfo .alert-success {
    background-color: rgba(25, 135, 84, 0.1);
    border: none;
    border-radius: 12px;
    color: #1a103c;
    border-left: 4px solid rgba(25, 135, 84, 0.5);
}

#paymentInfo .fa-check-circle {
    color: #198754;
}

/* Responsive Adjustments */
@media (max-width: 767px) {
    #enrollmentModal .modal-body {
        padding: 20px 15px;
    }

    #registrationForm .form-control {
        height: 48px;
        font-size: 0.95rem;
    }

    #registrationForm .text-center .btn-primary {
        width: 100%;
        padding: 12px 20px !important;
        font-size: 0.95rem !important;
    }

    #registrationForm .mb-3::before {
        top: 40px;
    }

    #paymentInfo .amount {
        font-size: 1.5rem;
    }
}
/* Enhanced Form Styling - End */

/* ... existing styles continue below ... */
</style>

    <!-- breadcrumb start-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="course-header">
                        <h1 class="course-title">{{ $course->title }}</h1>
                        <div class="course-meta">
                            <span class="duration"><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                            <span class="schedule"><i class="fas fa-calendar-alt"></i> {{ $course->schedule }}</span>
                            @if($course->categories->isNotEmpty())
                                <span class="category"><i class="fas fa-tag"></i> {{ $course->categories->first()->name }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 course_details_left">
                    <div class="main_image">
                        @if($course->thumbnail)
                            <img class="img-fluid course-thumbnail" src="{{ env('APP_URL') . '/storage/app/public/' . $course->thumbnail }}" alt="{{ $course->title }}">
                        @else
                            <img class="img-fluid course-thumbnail" src="{{ asset('assets/img/single_cource.png') }}" alt="{{ $course->title }}">
                        @endif
                    </div>
                    <div class="content_wrapper">
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
    <!-- Bottom enrollment section with end date display -->
    <div class="bottom-enrollment-section">
        <div class="container">
            <div class="enrollment-card">
                <div class="enrollment-card-inner">
                    <div class="enrollment-card-content">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="price-info">
                                    <span class="label animate-text">HỌC PHÍ</span>
                                    <div class="price-wrapper">
                                        <h3 class="price shine-text">{{ number_format($course->sale_price, 0, ',', '.') }} VND</h3>
                                        @if($course->regular_price && $course->regular_price != $course->sale_price)
                                            <span class="original-price">{{ number_format($course->regular_price, 0, ',', '.') }} VND</span>
                                        @endif
                                    </div>
                                    <div class="end-date-info">Đến hết ngày <span class="end-date">--/--/----</span></div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="countdown-info">
                                    <span class="label animate-text">KẾT THÚC SAU</span>
                                    <div class="countdown countdown-highlight">
                                        <div class="countdown-item">
                                            <span id="days-bottom">00</span>
                                            <span class="label">NGÀY</span>
                                        </div>
                                        <div class="countdown-item">
                                            <span id="hours-bottom">00</span>
                                            <span class="label">GIỜ</span>
                                        </div>
                                        <div class="countdown-item">
                                            <span id="minutes-bottom">00</span>
                                            <span class="label">PHÚT</span>
                                        </div>
                                        <div class="countdown-item">
                                            <span id="seconds-bottom">00</span>
                                            <span class="label">GIÂY</span>
                                        </div>
                                    </div>
                                    <div class="end-date-info text-center mt-2">
                                        Đến ngày <span class="end-date">--/--/----</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="enroll-btn animated-btn" onclick="openEnrollModal()">
                                    <span>Đăng Ký Ngay</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Banner -->
    <div id="enrollmentPopup" class="enrollment-popup">
        <div class="popup-content">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="price-info">
                        <span class="label">HỌC PHÍ</span>
                        <div class="price-wrapper">
                            <h3 class="price">{{ number_format($course->sale_price, 0, ',', '.') }} VND</h3>
                            @if($course->regular_price && $course->regular_price != $course->sale_price)
                                <span class="original-price">{{ number_format($course->regular_price, 0, ',', '.') }} VND</span>
                            @endif
                        </div>
                        <div class="end-date-info">Đến hết ngày <span class="end-date">--/--/----</span></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="enrollment-info">
                        <div class="info-item countdown-container">
                            <div class="countdown-wrapper">
                                <span class="label">KẾT THÚC SAU</span>
                                <div id="countdown-popup" class="countdown countdown-highlight">
                                    <div class="countdown-item">
                                        <span id="days-popup">00</span>
                                        <span class="label">NGÀY</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span id="hours-popup">00</span>
                                        <span class="label">GIỜ</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span id="minutes-popup">00</span>
                                        <span class="label">PHÚT</span>
                                    </div>
                                    <div class="countdown-item">
                                        <span id="seconds-popup">00</span>
                                        <span class="label">GIÂY</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <button class="enroll-btn" onclick="openEnrollModal()">Đăng Ký Ngay</button>
                </div>
            </div>
            <button id="closePopup" class="close-popup"><i class="fas fa-times"></i></button>
        </div>
    </div>
    @endif

    <!-- Modal thanh toán -->
    <div class="modal fade" id="enrollmentModal" tabindex="-1" aria-labelledby="enrollmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
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
                        <div class="mb-3">
                            <label for="referral_code" class="form-label">Mã giới thiệu <small class="text-muted">(nếu có)</small></label>
                            <input type="text" class="form-control" id="referral_code" placeholder="Nhập mã giới thiệu nếu có">
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

    <!-- Create a new course promo popup -->
    <div id="coursePromoPopup" class="course-promo-popup">
        <div class="popup-close" onclick="closePromoPopup()">
            <i class="fas fa-times"></i>
        </div>
        <div class="promo-content">
            <div class="course-badge">KHOÁ HỌC</div>
            <h2 class="course-title-popup">{{ $course->title }}</h2>
            <div class="price-section">
                <div class="price-label">HỌC PHÍ</div>
                <div class="price-wrapper">
                    <div class="price-amount">{{ number_format($course->sale_price, 0, ',', '.') }} VND</div>
                    @if($course->regular_price && $course->regular_price != $course->sale_price)
                        <div class="original-price-popup">{{ number_format($course->regular_price, 0, ',', '.') }} VND</div>
                    @endif
                </div>
                <div class="promo-period">Đến hết ngày <span class="end-date">--/--/----</span></div>
            </div>
            <button class="register-button" onclick="openEnrollModal()">ĐĂNG KÝ NGAY</button>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show loading screen for exactly 1 second, then show the page and popup
    setTimeout(() => {
        const loadingScreen = document.getElementById('loading-screen');
        loadingScreen.style.opacity = '0';
        setTimeout(() => {
            loadingScreen.style.visibility = 'hidden';

            // Show popup immediately after the loading screen disappears
            if (!getCookie('promoPopupClosed')) {
                document.getElementById('coursePromoPopup').style.display = 'block';
            }
        }, 300);
    }, 1000);

    // Set up CSRF token cho AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Mobile Detection
    const isMobile = window.innerWidth <= 767;

    // Update countdown on load and every second
    startCountdown();

    // Initialize animations for the bottom enrollment section
    initBottomSectionAnimations();

    // Mobile optimizations
    if (isMobile) {
        optimizeForMobile();
    }

    // Show popup after a delay, only on first visit
    if (!getCookie('popupClosed')) {
        // Show popup sooner on mobile
        const popupDelay = isMobile ? 1000 : 1500;
        setTimeout(function() {
            document.getElementById('enrollmentPopup').style.display = 'block';
        }, popupDelay);
    }

    // Close popup event listener with improved touch area
    document.getElementById('closePopup').addEventListener('click', function() {
        document.getElementById('enrollmentPopup').style.display = 'none';

        // Set a cookie to remember the popup was closed
        setCookie('popupClosed', 'true', 1); // 1 day
    });

    // Check if popup was previously closed
    if (getCookie('popupClosed') === 'true') {
        document.getElementById('enrollmentPopup').style.display = 'none';
    }

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

    // Add smooth scrolling
    smoothScrolling();

    // Add hover effects
    addHoverEffects();

    // Initialize animate on scroll
    initAnimations();

    // Add resize handler for orientation changes
    window.addEventListener('resize', function() {
        const wasMobile = isMobile;
        isMobile = window.innerWidth <= 767;

        // If state changed, re-apply optimizations
        if (!wasMobile && isMobile) {
            optimizeForMobile();
        }
    }, {passive: true});

    // Add this to ensure countdown is visible and updated
    // Fix potential layout issues that might hide countdown
    setTimeout(() => {
        console.log("Forcing countdown update");

        // Make sure the countdown containers are visible
        document.querySelectorAll('.countdown').forEach(el => {
            el.style.display = 'flex';
            el.style.visibility = 'visible';
            el.style.opacity = '1';
            el.style.zIndex = '1000';
        });

        // Force update countdown
        startCountdown();
    }, 1500);
});

// Function đếm ngược với hiệu ứng - completely replace the existing function
function startCountdown() {
    // Đặt thời gian kết thúc là 24h ngày T+2 (2 ngày sau hiện tại)
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 2); // Ngày T+2
    endDate.setHours(23, 59, 59, 999); // Đặt thời gian 23:59:59

    // Display the formatted end date where needed
    displayEndDate(endDate);

    function updateCountdown() {
        const now = new Date();
        const distance = endDate - now;

        if (distance < 0) {
            clearInterval(countdownTimer);
            document.querySelectorAll('.countdown').forEach(countdown => {
                countdown.innerHTML = '<div class="expired">Đã kết thúc</div>';
            });
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Force direct update of all countdown elements without animation
        updateElementContent('days-bottom', days);
        updateElementContent('hours-bottom', hours);
        updateElementContent('minutes-bottom', minutes);
        updateElementContent('seconds-bottom', seconds);

        updateElementContent('days-popup', days);
        updateElementContent('hours-popup', hours);
        updateElementContent('minutes-popup', minutes);
        updateElementContent('seconds-popup', seconds);
    }

    function updateElementContent(id, value) {
        const element = document.getElementById(id);
        if (element) {
            element.textContent = String(value).padStart(2, '0');
        }
    }

    function displayEndDate(endDate) {
        // Format the end date: DD/MM/YYYY
        const day = String(endDate.getDate()).padStart(2, '0');
        const month = String(endDate.getMonth() + 1).padStart(2, '0');
        const year = endDate.getFullYear();
        const formattedDate = `${day}/${month}/${year}`;

        // Update all end date display elements
        const endDateElements = document.querySelectorAll('.end-date');
        endDateElements.forEach(element => {
            element.textContent = formattedDate;
        });
    }

    // Initial update
    updateCountdown();

    // Update every second
    const countdownTimer = setInterval(updateCountdown, 1000);
}

// Optimize page for mobile
function optimizeForMobile() {
    // Make lesson items touchable
    document.querySelectorAll('.lesson-item').forEach(item => {
        item.style.cursor = 'pointer';
        item.addEventListener('touchstart', function() {
            this.style.backgroundColor = 'rgba(138, 76, 191, 0.03)';
        }, {passive: true});
        item.addEventListener('touchend', function() {
            this.style.backgroundColor = '#fff';
        }, {passive: true});
    });

    // Make buttons more tappable
    document.querySelectorAll('button, .btn').forEach(btn => {
        if (btn.offsetHeight < 44) {
            btn.style.minHeight = '44px';
        }
    });

    // Improve form elements
    document.querySelectorAll('input').forEach(input => {
        input.style.fontSize = '16px'; // Prevent iOS zoom
    });

    // Add new improvements
    enhanceMobileForm();
    improveScrolling();

    // Fix any notch issues
    document.body.style.paddingBottom = 'env(safe-area-inset-bottom)';
    document.body.style.paddingLeft = 'env(safe-area-inset-left)';
    document.body.style.paddingRight = 'env(safe-area-inset-right)';

    // Improve QR code display
    const qrCode = document.getElementById('qrCode');
    if (qrCode) {
        qrCode.addEventListener('load', function() {
            this.style.width = '100%';
            this.style.maxWidth = '250px';
            this.style.height = 'auto';
        });
    }
}

// Cookie functions
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Function to ensure visible content
function setupContentVisibilityOnFocus() {
    // Simplified version since we no longer have a fixed bottom section
    const interactiveElements = document.querySelectorAll('input, textarea, button, a, select, .lesson-item');

    interactiveElements.forEach(element => {
        element.addEventListener('focus', function() {
            // If on mobile, scroll a bit to ensure element is visible
            if (window.innerWidth <= 767) {
                setTimeout(() => {
                    window.scrollBy(0, 10);
                }, 300);
            }
        });
    });
}

// This function has been replaced with the updated version at the top of the script
// Keeping it here for reference but it's not used
function legacyStartCountdown() {
    // Old countdown implementation - not used
}

// Add smooth scrolling effects
function smoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Add hover effects to elements
function addHoverEffects() {
    // Add hover effect to lesson items
    const lessonItems = document.querySelectorAll('.lesson-item');
    lessonItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 15px 30px rgba(0,0,0,0.1)';
        });

        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.05)';
        });
    });
}

// Initialize animations on scroll
function initAnimations() {
    const elements = document.querySelectorAll('.course-header, .main_image, .content_wrapper, .lesson-item');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    elements.forEach(el => {
        observer.observe(el);
    });
}

function showRegistrationForm() {
    document.getElementById('registrationForm').style.display = 'block';
    document.getElementById('paymentInfo').style.display = 'none';
}

function showPaymentQR() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();

    if (!name || !email || !phone) {
        Swal.fire({
            icon: 'error',
            title: 'Thiếu thông tin',
            text: 'Vui lòng nhập đầy đủ thông tin!',
            confirmButtonColor: '#8a4cbf'
        });
        return;
    }

    if (!isValidEmail(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Email không hợp lệ',
            text: 'Vui lòng nhập email hợp lệ!',
            confirmButtonColor: '#8a4cbf'
        });
        return;
    }

    if (!isValidPhone(phone)) {
        Swal.fire({
            icon: 'error',
            title: 'Số điện thoại không hợp lệ',
            text: 'Vui lòng nhập số điện thoại hợp lệ!',
            confirmButtonColor: '#8a4cbf'
        });
        return;
    }

    // Tạo nội dung chuyển khoản: mã khóa học + số điện thoại
    const transferContent = `{{ $course->course_code }} ${phone}`;
    document.getElementById('transferContent').textContent = transferContent;

    // Tạo QR code với nội dung mới
    const amount = {{ $course->getCurrentPrice() }};
    const qrUrl = `https://img.vietqr.io/image/tpbank-05261994118-compact2.jpg?amount=${amount}&addInfo=${encodeURIComponent(transferContent)}`;
    document.getElementById('qrCode').src = qrUrl;

    // Hiển thị phần thanh toán với animation
    document.getElementById('registrationForm').style.display = 'none';
    const paymentInfo = document.getElementById('paymentInfo');
    paymentInfo.style.display = 'block';
    paymentInfo.classList.add('animated');
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidPhone(phone) {
    const re = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;
    return re.test(phone);
}

// Hàm xác nhận thanh toán với hiệu ứng
function confirmPayment() {
    // Get form values
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const referralCode = document.getElementById('referral_code').value.trim();
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
            referral_code: referralCode,
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

// Hàm hiển thị thông báo thành công với hiệu ứng
function showSuccessMessage() {
    // Ẩn nút xác nhận
    const confirmBtn = document.getElementById('confirmPayment');
    confirmBtn.style.display = 'none';

    // Hiển thị thông báo thành công với animation
    const successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';
    successMessage.classList.add('animated');

    // Đóng modal sau 3 giây
    setTimeout(function() {
        $('#enrollmentModal').modal('hide');

        // Hiển thị thông báo SweetAlert2
        Swal.fire({
            icon: 'success',
            title: 'Đăng ký thành công!',
            text: 'Vui lòng kiểm tra email của bạn.',
            confirmButtonColor: '#8a4cbf',
            showClass: {
                popup: 'animate__animated animate__fadeInUp'
            }
        });
    }, 3000);
}

// Improve mobile form handling
function enhanceMobileForm() {
    // Get all form fields
    const formFields = document.querySelectorAll('input, select, textarea');

    // Add better mobile form handling
    formFields.forEach(field => {
        // Add tap effect
        field.addEventListener('touchstart', function() {
            this.classList.add('tap-zoom');
            setTimeout(() => {
                this.classList.remove('tap-zoom');
            }, 300);
        });

        // Auto dismiss keyboard on enter for single line inputs
        if (field.tagName === 'INPUT' && field.type !== 'textarea') {
            field.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    this.blur();
                }
            });
        }
    });

    // Add tap effect to buttons
    document.querySelectorAll('button, .btn, .enroll-btn').forEach(btn => {
        btn.addEventListener('touchstart', function() {
            this.classList.add('tap-zoom');
            setTimeout(() => {
                this.classList.remove('tap-zoom');
            }, 300);
        });
    });
}

// Better mobile scroll handling
function improveScrolling() {
    // Use passive listeners for better scroll performance
    document.addEventListener('touchstart', function() {}, {passive: true});
    document.addEventListener('touchmove', function() {}, {passive: true});

    // Handle modal scrolling
    const modalBody = document.querySelector('.modal-body');
    if (modalBody) {
        modalBody.addEventListener('touchmove', function(e) {
            e.stopPropagation();
        }, {passive: true});
    }
}

// Function to initialize animations for the bottom enrollment section
function initBottomSectionAnimations() {
    // Add staggered animation to countdown items
    const countdownItems = document.querySelectorAll('.bottom-enrollment-section .countdown-item');
    countdownItems.forEach((item, index) => {
        item.style.animationDelay = `${0.1 * (index + 1)}s`;
        item.classList.add('animate-text');
    });

    // Add pulse animation to price
    setInterval(() => {
        const priceElement = document.querySelector('.bottom-enrollment-section .price');
        if (priceElement) {
            priceElement.classList.add('pulse');
            setTimeout(() => {
                priceElement.classList.remove('pulse');
            }, 600);
        }
    }, 5000);
}

// Function to show the course promo popup with delay
function showPromoPopup() {
    // This function is no longer needed as we're showing the popup immediately after loading
}

// Function to close the promo popup
function closePromoPopup() {
    document.getElementById('coursePromoPopup').style.display = 'none';
    setCookie('promoPopupClosed', 'true', 1); // Set cookie for 1 day
}
</script>

@endsection
