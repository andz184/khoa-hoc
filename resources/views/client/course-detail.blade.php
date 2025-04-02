@extends('layouts.client')

@section('content')
<!-- Hero Section -->
<section class="hero_section padding_top">
    <div class="hero_bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero_text">
                        <div class="badge badge-primary mb-3">Limited Time Offer</div>
                        <h1 class="display-4 mb-4">Master Web Development from Zero to Hero</h1>
                        <p class="lead mb-4">Learn modern web development with HTML5, CSS3, JavaScript, React, Node.js, and MongoDB. Build real-world projects and launch your career as a full-stack developer.</p>
                        <div class="hero_meta mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rating mr-3">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <span class="text-white">4.9 Ratings</span>
                            </div>
                            <div class="d-flex">
                                <span class="mr-4 text-white"><i class="fas fa-user-graduate"></i> 12,500 Students</span>
                                <span class="mr-4 text-white"><i class="fas fa-clock"></i> 48 Hours</span>
                                <span class="text-white"><i class="fas fa-book"></i> 156 Lessons</span>
                            </div>
                        </div>
                        <div class="hero_price">
                            <div class="price_wrapper">
                                <div class="original_price">
                                    <span class="text-white text-decoration-line-through">$199.99</span>
                                </div>
                                <div class="current_price">
                                    <h2 class="mb-0 text-white">$49.99</h2>
                                    <span class="badge badge-success">Save 75%</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero_buttons mt-4">
                            @if($course->allow_registration)
                                <a href="#pricing" class="btn btn-primary btn-lg mr-3">Get Started Now</a>
                            @endif
                            <a href="#curriculum" class="btn btn-outline-light btn-lg">View Curriculum</a>
                        </div>
                        <div class="guarantee mt-3">
                            <p class="mb-0 text-white"><i class="fas fa-shield-alt text-success mr-2"></i>7-Day Money Back Guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero_image">
                        <img src="{{ asset('assets/img/course_placeholder.jpg') }}" class="img-fluid rounded shadow" alt="Web Development Course">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Stats Section -->
<section class="stats_section padding_top">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="stat_item text-center">
                    <div class="stat_number">12,500+</div>
                    <div class="stat_text">Students Enrolled</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat_item text-center">
                    <div class="stat_number">4.9</div>
                    <div class="stat_text">Average Rating</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat_item text-center">
                    <div class="stat_number">156+</div>
                    <div class="stat_text">Course Lessons</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat_item text-center">
                    <div class="stat_number">48+</div>
                    <div class="stat_text">Hours of Content</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Benefits Section -->
<section class="benefits_section padding_top">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2>What You'll Get From This Course</h2>
            <p>Everything you need to master web development</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="benefit_item">
                    <div class="benefit_icon">
                        <i class="fas fa-clock text-primary"></i>
                    </div>
                    <div class="benefit_content">
                        <h4>Save Time</h4>
                        <p>Learn at your own pace with our structured curriculum and save valuable time</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="benefit_item">
                    <div class="benefit_icon">
                        <i class="fas fa-graduation-cap text-primary"></i>
                    </div>
                    <div class="benefit_content">
                        <h4>Get Certified</h4>
                        <p>Earn a certificate upon completion to showcase your skills</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="benefit_item">
                    <div class="benefit_icon">
                        <i class="fas fa-mobile-alt text-primary"></i>
                    </div>
                    <div class="benefit_content">
                        <h4>Learn Anywhere</h4>
                        <p>Access course content on any device, anytime, anywhere</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="benefit_item">
                    <div class="benefit_icon">
                        <i class="fas fa-users text-primary"></i>
                    </div>
                    <div class="benefit_content">
                        <h4>Join Community</h4>
                        <p>Connect with other learners and share experiences</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Curriculum Section -->
<section id="curriculum" class="curriculum_section padding_top">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2>Course Curriculum</h2>
            <p>Get a detailed overview of what you'll learn</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="curriculum_list">
                    <div class="curriculum_item">
                        <div class="d-flex align-items-center">
                            <div class="lesson_number">1</div>
                            <div class="lesson_content">
                                <h5>Introduction to Web Development</h5>
                                <p class="mb-0">Learn the basics of web development and set up your development environment</p>
                            </div>
                            <div class="lesson_duration">
                                <span class="badge badge-light">45 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="curriculum_item">
                        <div class="d-flex align-items-center">
                            <div class="lesson_number">2</div>
                            <div class="lesson_content">
                                <h5>HTML5 Fundamentals</h5>
                                <p class="mb-0">Master HTML5 structure, elements, and semantic markup</p>
                            </div>
                            <div class="lesson_duration">
                                <span class="badge badge-light">60 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="curriculum_item">
                        <div class="d-flex align-items-center">
                            <div class="lesson_number">3</div>
                            <div class="lesson_content">
                                <h5>CSS3 Styling</h5>
                                <p class="mb-0">Learn CSS3 properties, flexbox, grid, and responsive design</p>
                            </div>
                            <div class="lesson_duration">
                                <span class="badge badge-light">75 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="curriculum_item">
                        <div class="d-flex align-items-center">
                            <div class="lesson_number">4</div>
                            <div class="lesson_content">
                                <h5>JavaScript Basics</h5>
                                <p class="mb-0">Understand JavaScript fundamentals, functions, and DOM manipulation</p>
                            </div>
                            <div class="lesson_duration">
                                <span class="badge badge-light">90 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
@if($course->allow_registration)
<section id="pricing" class="pricing_section padding_top">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2>Choose Your Plan</h2>
            <p>Select the best plan that suits your needs</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="pricing_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="pricing_header text-center mb-4">
                                <h3>Basic</h3>
                                <div class="price">
                                    <h2 class="mb-0">$49.99</h2>
                                    <p class="text-muted">One-time payment</p>
                                </div>
                            </div>
                            <div class="pricing_features mb-4">
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Full lifetime access</span>
                                </div>
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Access on mobile and desktop</span>
                                </div>
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Certificate of completion</span>
                                </div>
                            </div>
                            <form action="{{ route('payment.create', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">Thanh toán với VNPay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pricing_card featured">
                    <div class="card">
                        <div class="card-body">
                            <div class="pricing_header text-center mb-4">
                                <span class="badge badge-primary mb-2">Most Popular</span>
                                <h3>Premium</h3>
                                <div class="price">
                                    <h2 class="mb-0">$74.99</h2>
                                    <p class="text-muted">One-time payment</p>
                                </div>
                            </div>
                            <div class="pricing_features mb-4">
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Everything in Basic</span>
                                </div>
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>1-on-1 Consultation</span>
                                </div>
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Priority Support</span>
                                </div>
                            </div>
                            <a href="#payment" class="btn btn-primary btn-block">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="pricing_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="pricing_header text-center mb-4">
                                <h3>Enterprise</h3>
                                <div class="price">
                                    <h2 class="mb-0">$99.99</h2>
                                    <p class="text-muted">One-time payment</p>
                                </div>
                            </div>
                            <div class="pricing_features mb-4">
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Everything in Premium</span>
                                </div>
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Custom Learning Path</span>
                                </div>
                                <div class="feature_item d-flex align-items-center mb-2">
                                    <i class="fas fa-check-circle text-success mr-2"></i>
                                    <span>Team Training</span>
                                </div>
                            </div>
                            <a href="#payment" class="btn btn-primary btn-block">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment QR Section -->
<section id="payment" class="payment_qr_section padding_top">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2>Thanh toán với VNPay</h2>
            <p>Chọn phương thức thanh toán phù hợp</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="payment_methods">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="qr_code_wrapper text-center">
                                <img src="{{ asset('assets/img/payment/vnpay-logo.png') }}" alt="VNPay Logo" class="img-fluid mb-3" style="max-width: 200px;">
                                <h4>Thanh toán qua VNPay</h4>
                                <p class="text-muted">Hỗ trợ tất cả các ngân hàng Việt Nam</p>
                                <div class="supported_banks">
                                    <img src="{{ asset('assets/img/payment/vietcombank.png') }}" alt="Vietcombank" class="bank-logo">
                                    <img src="{{ asset('assets/img/payment/techcombank.png') }}" alt="Techcombank" class="bank-logo">
                                    <img src="{{ asset('assets/img/payment/acb.png') }}" alt="ACB" class="bank-logo">
                                    <img src="{{ asset('assets/img/payment/vietinbank.png') }}" alt="Vietinbank" class="bank-logo">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment_instructions">
                                <h4>Hướng dẫn thanh toán</h4>
                                <ol class="payment_steps">
                                    <li>Chọn "Thanh toán với VNPay"</li>
                                    <li>Chọn ngân hàng của bạn</li>
                                    <li>Đăng nhập vào tài khoản ngân hàng</li>
                                    <li>Xác nhận thông tin thanh toán</li>
                                    <li>Nhập mã OTP để hoàn tất</li>
                                    <li>Lưu lại biên nhận thanh toán</li>
                                </ol>
                                <div class="payment_note mt-4">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Sau khi thanh toán thành công, bạn sẽ được chuyển hướng về trang chủ và có thể truy cập khóa học ngay lập tức.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="pricing_section padding_top">
    <div class="container">
        <div class="alert alert-warning text-center">
            <h4 class="mb-0"><i class="fas fa-exclamation-triangle mr-2"></i>Khóa học này hiện không cho phép đăng ký</h4>
            <p class="mb-0 mt-2">Vui lòng quay lại sau để được thông báo khi khóa học mở đăng ký.</p>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section -->
<section class="testimonials_section padding_top">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2>What Our Students Say</h2>
            <p>Read testimonials from our successful students</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="testimonial_text">"This course completely transformed my understanding of web development. The instructor's teaching style is clear and engaging."</p>
                            <div class="testimonial_author">
                                <img src="{{ asset('assets/img/testimonials/user1.jpg') }}" alt="" class="rounded-circle mr-2">
                                <div>
                                    <h5 class="mb-0">John Smith</h5>
                                    <small class="text-muted">Frontend Developer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="testimonial_text">"The practical projects in this course helped me build a strong portfolio. I landed my first job thanks to this course!"</p>
                            <div class="testimonial_author">
                                <img src="{{ asset('assets/img/testimonials/user2.jpg') }}" alt="" class="rounded-circle mr-2">
                                <div>
                                    <h5 class="mb-0">Sarah Johnson</h5>
                                    <small class="text-muted">Full Stack Developer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial_card">
                    <div class="card">
                        <div class="card-body">
                            <div class="rating mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="testimonial_text">"The course content is well-structured and the support is excellent. I highly recommend this course to anyone starting their web development journey."</p>
                            <div class="testimonial_author">
                                <img src="{{ asset('assets/img/testimonials/user3.jpg') }}" alt="" class="rounded-circle mr-2">
                                <div>
                                    <h5 class="mb-0">Mike Wilson</h5>
                                    <small class="text-muted">Backend Developer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq_section padding_top">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about this course</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="card">
                        <div class="card-header" id="faq1">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1">
                                    How long do I have access to the course?
                                </button>
                            </h2>
                        </div>
                        <div id="collapse1" class="collapse show" data-parent="#faqAccordion">
                            <div class="card-body">
                                You have lifetime access to the course. Once you purchase, you can access all the content anytime, anywhere.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faq2">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2">
                                    Can I access the course on mobile devices?
                                </button>
                            </h2>
                        </div>
                        <div id="collapse2" class="collapse" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, the course is fully responsive and can be accessed on any device including smartphones and tablets.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faq3">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3">
                                    Do I get a certificate upon completion?
                                </button>
                            </h2>
                        </div>
                        <div id="collapse3" class="collapse" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, you will receive a certificate of completion once you finish all the course materials.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
@if($course->allow_registration)
<section class="cta_section padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>Ready to Get Started?</h2>
                <p class="lead mb-4">Join thousands of students who have already enrolled in this course</p>
                <a href="#pricing" class="btn btn-primary btn-lg">Enroll Now</a>
            </div>
        </div>
    </div>
</section>
@endif

<style>
.hero_section {
    position: relative;
    padding: 100px 0;
    background: linear-gradient(135deg, #0984e3 0%, #0773c5 100%);
    overflow: hidden;
}

.hero_bg {
    position: relative;
    z-index: 1;
}

.hero_bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset('assets/img/hero-bg.jpg') }}') center/cover no-repeat;
    opacity: 0.1;
    z-index: -1;
}

.hero_text {
    color: #fff;
}

.hero_text h1 {
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}

.hero_text .lead {
    color: rgba(255,255,255,0.9);
}

.hero_image {
    position: relative;
    z-index: 2;
}

.hero_image img {
    border: 5px solid #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.payment_qr_section {
    padding: 80px 0;
    background: #f8f9fa;
}

.payment_methods {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 40px;
}

.qr_code_wrapper {
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.qr_code_wrapper img {
    max-width: 200px;
    height: auto;
}

.supported_banks {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.bank-logo {
    height: 30px;
    width: auto;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

.bank-logo:hover {
    opacity: 1;
}

.payment_instructions {
    padding: 20px;
}

.payment_steps {
    list-style: none;
    padding: 0;
    margin: 0;
}

.payment_steps li {
    margin-bottom: 15px;
    padding-left: 30px;
    position: relative;
}

.payment_steps li::before {
    content: '{{ $loop->iteration }}';
    position: absolute;
    left: 0;
    top: 0;
    width: 20px;
    height: 20px;
    background: #0984e3;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}

.payment_note .alert {
    border-radius: 10px;
    border: none;
    background: #e3f2fd;
    color: #0d47a1;
}

@media (max-width: 991px) {
    .hero_section {
        padding: 60px 0;
    }

    .hero_image {
        margin-top: 40px;
    }

    .payment_methods {
        padding: 20px;
    }

    .qr_code_wrapper {
        margin-bottom: 30px;
    }
}
</style>
@endsection
