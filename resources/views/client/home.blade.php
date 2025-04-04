@extends('layouts.client')

@section('title', 'Trang Chủ')

@section('content')

<script>
// Set the date we're counting down to (2 days from now)
const countDownDate = new Date();
countDownDate.setDate(countDownDate.getDate() + 2);
countDownDate.setHours(23, 59, 59, 0);
</script>

<!-- banner part start-->
<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap');

* {
    box-sizing: border-box;
    font-family: 'Be Vietnam Pro', sans-serif;
}

body {
    background-color: #1a103c;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236a4c93' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    overflow-x: hidden;
    max-width: 100vw;
}

.banner_text_iner h1 {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 700;
    letter-spacing: -0.3px;
}

.banner_text_iner h5 {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 500;
    letter-spacing: 0.2px;
}

.banner_text_iner p {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 400;
    line-height: 1.6;
}

.page-header {
    text-align: center;
    padding: 40px 0 20px;
}

.page-header h1 {
    font-size: 36px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 15px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.page-header p {
    font-size: 18px;
    color: #e5e0ff;
    max-width: 700px;
    margin: 0 auto 30px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.section-title {
    text-align: center;
    margin-bottom: 30px;
}

.section-title h2 {
    font-size: 28px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 10px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.section-title p {
    font-size: 16px;
    color: #cb9dff;
    max-width: 700px;
    margin: 0 auto;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.course-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 20px;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    overflow: hidden;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    border-color: rgba(205, 156, 255, 0.2);
}

.course-image {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    margin-bottom: 15px;
}

.course-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.course-card:hover .course-image img {
    transform: scale(1.05);
}

.course-category {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(155, 89, 182, 0.8);
    color: #ffffff;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    z-index: 2;
}

.course-title {
    font-size: 20px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 10px;
    line-height: 1.3;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.course-description {
    font-size: 14px;
    color: #e5e0ff;
    margin-bottom: 15px;
    line-height: 1.5;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.course-price {
    font-size: 18px;
    font-weight: 700;
    color: #dfbcff;
    margin-bottom: 15px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.course-price .original {
    font-size: 14px;
    color: #a090c2;
    text-decoration: line-through;
    margin-left: 10px;
    font-weight: 500;
}

.btn-view-course {
    display: inline-block;
    background: rgba(155, 89, 182, 0.2);
    color: #ffffff;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    border: 1px solid rgba(155, 89, 182, 0.3);
}

.btn-view-course:hover {
    background: rgba(155, 89, 182, 0.4);
    transform: translateY(-2px);
    text-decoration: none;
    color: #ffffff;
}

.btn-register-course {
    display: inline-block;
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF);
    color: #ffffff;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    margin-left: 10px;
    box-shadow: 0 4px 15px rgba(138, 76, 191, 0.3);
}

.btn-register-course:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(138, 76, 191, 0.4);
    text-decoration: none;
    color: #ffffff;
}

.category-section {
    margin-bottom: 50px;
}

.category-title {
    font-size: 24px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 20px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.feature-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 15px;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    text-align: center;
    margin-bottom: 30px;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    border-color: rgba(205, 156, 255, 0.2);
}

.feature-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(205, 156, 255, 0.2), rgba(156, 85, 255, 0.2));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #CD9CFF;
    margin: 0 auto 15px;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    background: linear-gradient(135deg, rgba(205, 156, 255, 0.3), rgba(156, 85, 255, 0.3));
    color: #ffffff;
    transform: scale(1.1);
}

.feature-title {
    font-size: 18px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 10px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.feature-description {
    font-size: 14px;
    color: #e5e0ff;
    line-height: 1.5;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.cta-section {
    text-align: center;
    padding: 50px 0;
    background: linear-gradient(45deg, rgba(138, 76, 191, 0.2), rgba(155, 89, 182, 0.1));
    border-radius: 16px;
    margin: 50px 0;
}

.cta-title {
    font-size: 28px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 15px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.cta-description {
    font-size: 16px;
    color: #e5e0ff;
    max-width: 700px;
    margin: 0 auto 30px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.btn-cta {
    display: inline-block;
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF);
    color: #ffffff;
    padding: 12px 25px;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 8px 15px rgba(138, 76, 191, 0.3);
}

.btn-cta:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 20px rgba(138, 76, 191, 0.4);
    text-decoration: none;
    color: #ffffff;
}
</style>

<div class="page-header">
    <div class="container">
        <h1>Khóa Học AI & Automation</h1>
        <p>Nâng cao kỹ năng và phát triển sự nghiệp với các khóa học chất lượng cao về trí tuệ nhân tạo và tự động hóa.</p>
    </div>
</div>

<!-- Featured Courses Section -->
<section class="featured-courses">
    <div class="container">
        <div class="section-title">
            <h2>Khóa Học Nổi Bật</h2>
            <p>Những khóa học được yêu thích nhất</p>
        </div>

        <div class="row">
            @foreach($featuredCourses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-card">
                    <div class="course-image">
                        @if($course->categories->isNotEmpty())
                            <div class="course-category">{{ $course->categories->first()->name }}</div>
                        @endif
                        @if($course->thumbnail)
                            <img src="{{ env('APP_URL') . '/storage/app/public/' . $course->thumbnail }}" alt="{{ $course->title }}">
                        @else
                            <img src="{{ asset('assets/img/special_cource_1.png') }}" alt="{{ $course->title }}">
                        @endif
                    </div>
                    <h3 class="course-title">{{ $course->title }}</h3>
                    <p class="course-description">{{ Str::limit($course->short_description, 100) }}</p>
                    <div class="course-price">
                        {{ number_format($course->getCurrentPrice(), 0, ',', '.') }} VND
                        @if($course->regular_price && $course->getCurrentPrice() < $course->regular_price)
                            <span class="original">{{ number_format($course->regular_price, 0, ',', '.') }} VND</span>
                        @endif
                    </div>
                    <div class="course-actions">
                        <a href="{{ route('course-detail', $course->slug) }}" class="btn-view-course">Xem Chi Tiết</a>
                        <a href="{{ route('course-landing', $course->slug) }}" class="btn-register-course">Landing Page</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Categories Section -->
@foreach($categories as $category)
    @if($category->courses->where('is_published', true)->count() > 0)
    <section class="category-section">
        <div class="container">
            <h2 class="category-title">{{ $category->name }}</h2>
            <div class="row">
                @foreach($category->courses->where('is_published', true)->take(3) as $course)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <div class="course-image">
.banner_text_iner {
    width: 100%;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 350px;
    height: 100%;
    padding: 0;
}

.banner_video video {
    border-radius: 15px;
    position: relative;
    z-index: 1;
    width: 100%;
    height: auto;
    max-height: 100%;
    display: block;
    transform: translateY(0);
}

.banner_part .container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
    background: none !important;
}

.banner_text {
    width: 100%;
    position: relative;
    z-index: 2;
}

.banner_text_iner {
    width: 100%;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Align content to top */
    min-height: 270px;
    height: 100%;
    padding: 20px 0 15px; /* Adjust padding to fine-tune text position */
}

.banner_text_iner h1,
.banner_text_iner h5,
.banner_text_iner p {
    width: 100%;
    max-width: 100%;
    word-wrap: break-word;
}

/* Countdown Timer */
.countdown-container {
    margin-top: 20px;
    margin-bottom: 25px;
}

.countdown-title {
    color: #fff;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 15px;
    letter-spacing: 0.5px;
}

.countdown-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.countdown-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 15px;
}

.countdown-digit {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    font-weight: 700;
    color: #bb99ff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.countdown-digit::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.3), transparent);
}

.countdown-label {
    color: #e5e0ff;
    font-size: 12px;
    margin-top: 8px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.price-container {
    margin-top: 25px;
    text-align: center;
}

.price-label {
    font-size: 13px;
    text-transform: uppercase;
    color: #bb99ff;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 5px;
}

.price-value {
    font-size: 32px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 5px;
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.price-original {
    color: #a090c2;
    font-size: 16px;
    text-decoration: line-through;
    font-weight: 500;
}

@media (max-width: 991px) {
    .banner_part {
        padding: 40px 0;
        width: 100%;
        background: none !important;
    }
    .banner_part .container {
        padding: 0 15px;
        width: 100%;
        max-width: 100%;
    }
    .banner_part .row {
        flex-direction: column-reverse;
        margin: 0;
        width: 100%;
    }
    .banner_video {
        margin: 0;
        padding: 0;
        margin-top: 30px;
        width: 100%;
    }
    .banner_video video {
        border-radius: 10px;
        margin: 0;
        width: 100%;
    }
    .banner_text {
        padding: 20px 15px;
        text-align: center;
        width: 100%;
    }
    .col-lg-6 {
        padding: 0;
        width: 100%;
    }

    .banner_text_iner h1 {
        font-size: 28px;
        line-height: 1.4;
    }

    .banner_text_iner h5 {
        font-size: 14px;
    }

    .banner_text_iner p {
        font-size: 14px;
        line-height: 1.6;
    }

    .countdown-digit {
        width: 50px;
        height: 50px;
        font-size: 22px;
    }

    .countdown-wrapper {
        margin-bottom: 15px;
    }

    .price-value {
        font-size: 26px;
    }

    .price-original {
        font-size: 14px;
    }

    .btn_register {
        padding: 12px 30px;
        font-size: 14px;
    }

    .banner_text_iner {
        min-height: auto;
    }
}

@media (max-width: 576px) {
    body {
        overflow-x: hidden !important;
        width: 100%;
        max-width: 100vw;
    }

    html {
        overflow-x: hidden !important;
        max-width: 100vw;
    }

    .container {
        width: 100%;
        max-width: 100%;
        padding-left: 10px;
        padding-right: 10px;
        overflow-x: hidden;
    }

    .row {
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }

    .banner_text_iner h1,
    .banner_text_iner h5,
    .banner_text_iner p,
    .section_title h2,
    .feature_title,
    .solution_tagline {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        hyphens: auto;
    }

    .text-emphasis,
    .text-highlight,
    .highlight {
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        hyphens: auto;
    }

    /* Optimize banner to make room for countdown */
    .banner_part {
        padding: 5px 0;
        min-height: auto;
    }

    .banner_text_iner {
        padding: 5px 0;
    }

    .banner_text_iner h5 {
        font-size: 11px;
        margin-bottom: 5px;
    }

    .banner_text_iner h1 {
        font-size: 16px;
        line-height: 1.3;
        margin-bottom: 5px;
    }

    .banner_text_iner p {
        font-size: 11px;
        line-height: 1.3;
        margin-bottom: 5px;
    }

    /* Ensure countdown timer is properly visible */
    .countdown-container {
        margin-top: 5px;
        margin-bottom: 5px;
        width: 100%;
        display: block;
    }

    .countdown-title {
        font-size: 11px;
        margin-bottom: 8px;
    }

    .countdown-digit {
        width: 45px;
        height: 45px;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .countdown-label {
        font-size: 10px;
        text-align: center;
        margin-top: 5px;
    }

    .price-container {
        text-align: center;
        width: 100%;
        margin: 15px auto 0;
    }

    .price-label {
        font-size: 11px;
    }

    .price-value {
        font-size: 16px;
    }

    .price-original {
        font-size: 12px;
    }

    .btn_register {
        padding: 8px 20px;
        font-size: 12px;
        margin-top: 8px;
        display: inline-block;
        margin: 15px auto 0;
    }

    /* Push the feature section down to make room for countdown */
    .feature_part {
        padding: 5px 0;
        margin-top: 10px;
    }

    /* Feature part compact styles */
    .section_title {
        margin-bottom: 10px;
    }

    .section_title h2 {
        font-size: 16px;
        line-height: 1.3;
        margin-bottom: 5px;
        padding: 0 5px;
    }

    .section_title .subtitle {
        font-size: 11px;
        padding: 0 5px;
        line-height: 1.2;
    }

    .col-sm-6, .col-lg-3, .col-md-6, .col-lg-4 {
        padding-left: 4px;
        padding-right: 4px;
    }

    .feature_card {
        padding: 8px;
        margin-bottom: 8px;
        min-height: 0;
    }

    .feature_icon_wrapper {
        margin-bottom: 5px;
    }

    .feature_icon {
        width: 25px;
        height: 25px;
        font-size: 10px;
        margin-bottom: 0;
    }

    .feature_title {
        font-size: 11px;
        margin-bottom: 4px;
        line-height: 1.2;
    }

    .feature_description {
        font-size: 9px;
        line-height: 1.2;
        margin-bottom: 0;
    }

    .solution_summary {
        margin-top: 5px;
        margin-bottom: 0;
        padding: 8px;
    }

    .solution_tagline {
        font-size: 11px;
        margin-bottom: 4px;
    }

    .solution_description {
        font-size: 9px;
        margin-bottom: 8px;
    }

    /* Other mobile styles */
    .about_section, .benefits_section, .levels_section {
        padding: 15px 0;
    }

    .benefit_number {
        font-size: 30px;
        margin-bottom: 8px;
    }

    .benefit_title {
        font-size: 14px;
    }

    .benefit_description {
        font-size: 11px;
    }

    .level_header {
        padding: 10px;
    }

    .level_content {
        padding: 10px;
    }

    .level_list li {
        font-size: 11px;
        margin-bottom: 8px;
    }

    .single_feature_icon {
        width: 30px;
        height: 30px;
        font-size: 12px;
    }

    .course-card {
        margin-bottom: 15px;
    }

    .course-content {
        padding: 10px;
    }

    .course-title {
        font-size: 13px;
        max-height: 36px;
        margin-bottom: 4px;
    }

    .course-description {
        font-size: 11px;
        max-height: 32px;
        margin: 4px 0;
    }

    .course-price {
        font-size: 13px;
        margin-bottom: 5px;
    }

    .course-meta {
        margin-top: 6px;
        padding-top: 6px;
    }

    .single_feature {
        padding: 12px;
        margin-bottom: 12px;
    }

    .single_feature_part h4 {
        font-size: 13px;
        margin: 8px 0 4px;
    }

    .single_feature_part p {
        font-size: 11px;
        line-height: 1.3;
    }

    .module_card {
        padding: 12px 8px;
    }

    .module_number {
        width: 30px;
        height: 30px;
        font-size: 14px;
        margin-right: 8px;
    }

    .module_content h3 {
        font-size: 12px;
    }

    /* Make level content more compact */
    .level_header {
        padding: 8px 10px;
    }

    .level_header h3 {
        font-size: 12px;
        line-height: 1.2;
    }

    .level_content {
        padding: 8px 10px;
    }

    .level_list li {
        font-size: 10px;
        line-height: 1.2;
        margin-bottom: 5px;
    }

    .level_list li i {
        font-size: 10px;
        margin-right: 5px;
    }

    /* Reduce the CTA spacing */
    .cta_container {
        margin-top: 20px !important;
    }
}

/* Ngăn scroll ngang */
html, body {
    max-width: 100%;
    overflow-x: hidden;
}

.course-title {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 600;
}

.course-description {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 400;
}

.course-price {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 700;
}

.course-category {
    font-family: 'Be Vietnam Pro', sans-serif;
    font-weight: 500;
}

/* Additional Typography Styles */
h1, h2, h3, h4, h5, h6, p, a, span, li {
    font-family: 'Be Vietnam Pro', sans-serif;
}

h1, h2 {
    font-weight: 700;
    letter-spacing: -0.3px;
    color: #2d3436;
}

h3, h4 {
    font-weight: 600;
    color: #2d3436;
}

h5, h6 {
    font-weight: 500;
    color: #2d3436;
}

p {
    font-weight: 400;
    line-height: 1.6;
    color: #636e72;
}

.section_tittle h2 {
    font-size: 32px;
    margin-bottom: 10px;
}

.section_tittle p {
    color: #6c5ce7;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Button Styles */
.btn_1 {
    display: inline-block;
    background: #CD9CFF !important;
    border: 2px solid #b76dd4 !important;
    color: #ffffff !important;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 30px;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 6px 15px rgba(183, 109, 212, 0.4) !important;
    margin-top: 20px;
}

.btn_1:hover {
    background: #352863 !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 0 15px rgba(125, 75, 170, 0.5) !important;
}

.btn_1::after {
    display: none;
}

/* Feature Section */
.single_feature_text h2 {
    font-size: 28px;
    margin-bottom: 15px;
}

.single_feature_part h4 {
    font-size: 18px;
    margin: 15px 0 8px;
}

/* Learning Section */
.learning_member_text h5 {
    color: #9b59b6 !important;
    margin-bottom: 10px;
}

.learning_member_text h2 {
    margin-bottom: 15px;
}

.learning_member_text ul li {
    margin: 8px 0;
    display: flex;
    align-items: center;
}

.learning_member_text ul li span {
    margin-right: 8px;
    color: #9b59b6 !important;
}

/* Giảm padding và margin giữa các section */
section {
    padding: 10px 0;
}

.feature_part {
    padding: 15px 0 5px;
}

.learning_part {
    padding-top: 20px;
    padding-bottom: 20px;
}

.special_cource {
    padding-top: 10px;
}

.padding_top {
    padding-top: 10px;
}

.section_tittle {
    margin-bottom: 10px;
}

.text-emphasis {
    color: #ffffff;
    font-weight: 600;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.text-highlight {
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
}

.banner_text_iner h1 .highlight {
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
}

/* Make the banner text pop more */
.banner_text_iner {
    padding: 30px 0;
}

.banner_text_iner h5 {
    color: #cb9dff !important;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 5px;
    animation: fadeInUp 0.6s ease;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 18px;
}

.banner_text_iner h1 {
    font-size: 42px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 8px;
    animation: fadeInUp 0.8s ease;
    color: #ffffff;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    background: linear-gradient(to right, #ffffff, #dfbcff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.banner_text_iner p {
    font-size: 16px;
    line-height: 1.5;
    color: #e5e0ff;
    margin-bottom: 8px;
    animation: fadeInUp 1s ease;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
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

.btn_register {
    background: linear-gradient(45deg, #CD9CFF, #9C55FF) !important;
    color: white !important;
    font-weight: 700;
    padding: 15px 40px;
    border-radius: 30px;
    font-size: 16px;
    border: none;
    display: inline-block;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(156, 85, 255, 0.4);
    text-align: center;
    margin: 30px auto 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn_register:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px rgba(156, 85, 255, 0.5);
}

.banner_video {
    height: 100%;
    display: flex;
    align-items: center;
    margin-top: -20px; /* Move video up to align with text */
}

.banner_part .row {
    margin-bottom: 0;
    min-height: 270px;
    align-items: flex-start; /* Align items to top for better control */
}

@media (min-width: 992px) {
    .banner_part .container {
        display: flex;
        height: 100%;
    }

    .banner_part .row {
        flex: 1;
        display: flex;
        align-items: stretch;
    }

    .banner_part .col-lg-6 {
        display: flex;
        align-items: center;
    }

    .banner_text, .banner_video {
        height: 100%;
    }

    .banner_part .row {
        min-height: 270px;
    }

    .banner_text_iner h5 {
        margin-bottom: 5px;
    }

    .banner_text_iner h1 {
        margin-bottom: 10px;
    }

    .banner_text_iner p {
        margin-bottom: 5px;
    }

    .countdown-container {
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .countdown-title {
        margin-bottom: 5px;
    }

    .banner_text_iner {
        padding-top: 30px; /* Adjust text padding for better alignment on desktop */
    }

    .banner_video {
      padding-bottom: 50px;
      width: 700px;
    }
}
</style>
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>AI AUTOMATION TỪ CƠ BẢN ĐẾN NÂNG CAO</h5>
                        <h1>Xây Dựng <span class="highlight">AI Automation</span> Từ Cơ Bản Đến Nâng Cao</h1>
                        <p>Trong khóa học này, anh/chị không chỉ được học về cách <span class="text-emphasis">ứng dụng AI vào thực tế</span>, mà còn học về
                            <span class="text-emphasis">tự động hoá</span> và kết nối 2 công nghệ mạnh mẽ nhất với nhau để xây dựng các <span class="text-emphasis">Hệ thống AI Automation</span> <span class="text-highlight">VƯỢT XA SỨC TƯỞNG TƯỢNG</span> của nhiều người.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="banner_video">
                    <video autoplay loop muted playsinline>
                        <source src="https://n8niostorageaccount.blob.core.windows.net/n8nio-strapi-blobs-stage/assets/ai_hero_v2_vp9_82cf7a8e6a.webm" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- countdown section -->
<section class="countdown_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="countdown_container text-center">
                    <div class="countdown-title">Thời gian ưu đãi còn lại:</div>
                    <div class="countdown-wrapper">
                        <div class="countdown-item">
                            <div class="countdown-digit" id="days">00</div>
                            <div class="countdown-label">NGÀY</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-digit" id="hours">00</div>
                            <div class="countdown-label">GIỜ</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-digit" id="minutes">00</div>
                            <div class="countdown-label">PHÚT</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-digit" id="seconds">00</div>
                            <div class="countdown-label">GIÂY</div>
                        </div>
                    </div>

                    <div class="price-container">
                        <div class="countdown-pricing">
                            <div class="price-label">ĐĂNG KÝ TRƯỚC:</div>
                            <div class="price-value">2.999.000 VNĐ</div>
                            <div class="price-original">9.999.000 VNĐ</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('course') }}" class="btn_register">ĐĂNG KÝ NGAY</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.countdown_section {
    background-color: #1a103c;
    padding: 0;
    margin-top: -25px;
    position: relative;
    z-index: 10;
}

.countdown_container {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 20px;
    padding: 10px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.countdown-title {
    margin-bottom: 8px;
    font-size: 16px;
    color: #e5e0ff;
    font-weight: 600;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.countdown-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 8px;
    gap: 5px;
}

.countdown-item {
    min-width: 60px;
    background-color: #251552;
    border-radius: 12px;
    padding: 8px 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.countdown-digit {
    font-size: 24px;
    font-weight: 700;
    color: #dfbcff;
    margin-bottom: 2px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.countdown-label {
    font-size: 12px;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.countdown-pricing {
    margin-bottom: 15px;
}

.price-label {
    font-size: 16px;
    color: #e9e6ff;
    margin-bottom: 10px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.price-value {
    font-size: 32px;
    font-weight: 800;
    color: #dfbcff;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.price-original {
    color: #b7adde;
    text-decoration: line-through;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.btn_register {
    display: inline-block;
    padding: 12px 25px;
    background: linear-gradient(45deg, #8a4cbf, #CD9CFF);
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 10px;
    box-shadow: 0 8px 15px rgba(138, 76, 191, 0.3);
    transition: all 0.3s ease;
}

.btn_register:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 20px rgba(138, 76, 191, 0.4);
    background: linear-gradient(45deg, #9b59b6, #dfbcff);
    color: white;
    text-decoration: none;
}
</style>

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="section_title text-center mb-30">
            <h2>Những Khó Khăn Khi Bắt Đầu <span class="text_highlight">AI Automation</span></h2>
            <p class="subtitle">Những khó khăn này chỉ là khởi đầu – Giải pháp tự động hóa thông minh với AI đang chờ bạn!</p>
        </div>

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-reload"></i>
                </div>
            </div>
                    <h3 class="feature_title">Quá nhiều công việc lặp lại</h3>
                    <p class="feature_description">Không biết bắt đầu tự động hóa từ đâu mặc dù đang có rất nhiều công việc lặp lại hàng ngày.</p>
                    </div>
                </div>
            <div class="col-sm-6 col-lg-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-map-alt"></i>
            </div>
                    </div>
                    <h3 class="feature_title">Thiếu chiến lược rõ ràng</h3>
                    <p class="feature_description">Không có chiến lược xây dựng được quy trình rõ ràng để tự động hóa công việc hiệu quả.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-settings"></i>
                    </div>
                </div>
                    <h3 class="feature_title">Rào cản công nghệ</h3>
                    <p class="feature_description">Gặp khó khăn khi tiếp cận với công nghệ AI và các công cụ tự động hóa mới.</p>
            </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-alert"></i>
                        </div>
                    </div>
                    <h3 class="feature_title">Gặp lỗi và bỏ cuộc</h3>
                    <p class="feature_description">Tự động hóa nửa chừng nhưng toàn gặp lỗi, mất thời gian sửa chữa và cuối cùng là bỏ cuộc.</p>
                </div>
            </div>
        </div>

        <div class="solution_summary text-center mt-15">
            <p class="solution_tagline">Không cần biết code, không có kinh nghiệm vẫn có thể vận hành và thiết lập các kịch bản tự động hóa với AI</p>
            <p class="solution_description">Khóa học AI Automation của chúng tôi đã được triển khai thành công cho cá nhân và doanh nghiệp trong nhiều ngành hàng.</p>
            <a href="{{ route('course') }}" class="btn_register">Đăng Ký Khóa Học</a>
        </div>
    </div>
</section>

<style>
.feature_part {
    background-color: #1a103c;
    padding: 15px 0 5px;
    position: relative;
    overflow: hidden;
}

.section_title {
    margin-bottom: 60px;
}

.section_title h2 {
    font-size: 32px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 15px;
    line-height: 1.3;
}

.section_title .subtitle {
    font-size: 16px;
    color: #bb99ff;
    max-width: 700px;
    margin: 0 auto;
}

.feature_card {
    background-color: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 15px;
    margin-bottom: 8px;
    display: flex;
    flex-direction: column;
    height: 100%;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.feature_card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    border-color: rgba(205, 156, 255, 0.2);
}

.feature_icon_wrapper {
    margin-bottom: 20px;
}

.feature_icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(205, 156, 255, 0.2), rgba(156, 85, 255, 0.2));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #CD9CFF;
    margin-bottom: 5px;
    border: 1px solid rgba(205, 156, 255, 0.2);
    transition: all 0.3s ease;
}

.feature_card:hover .feature_icon {
    background: linear-gradient(135deg, rgba(205, 156, 255, 0.3), rgba(156, 85, 255, 0.3));
    color: #ffffff;
    transform: scale(1.05);
}

.feature_title {
    font-size: 18px;
    font-weight: 600;
    color: #ffffff;
    margin-bottom: 15px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.feature_description {
    font-size: 14px;
    line-height: 1.6;
    color: #e9e6ff;
    margin-bottom: 0;
    flex-grow: 1;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.solution_summary {
    margin-top: 10px;
    padding: 10px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.solution_tagline {
    font-size: 18px;
    font-weight: 600;
    color: #ffffff;
    margin-bottom: 15px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.solution_description {
    color: #e9e6ff;
    max-width: 800px;
    margin: 0 auto 30px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

@media (max-width: 991px) {
    .feature_part {
        padding: 60px 0;
    }

    .section_title h2 {
        font-size: 28px;
    }

    .solution_tagline {
        font-size: 16px;
    }
}
</style>
<!-- feature_part end-->

<!-- upcoming_event part start-->

<!-- learning part start-->
<section class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="course_content_box">
                    <div class="section_title text-center mb-40">
                        <h2>TỰ ĐỘNG HÓA VỚI <span class="text_highlight">AI Automation</span></h2>
                        <p class="subtitle">Thuần Thục sử dụng công cụ để thiết lập kịch bản tự động hoá trong 5 GIỜ</p>
                </div>

                    <div class="course_modules row">
                        <div class="col-md-4 col-sm-6 mb-30">
                            <div class="module_card">
                                <div class="module_number">1</div>
                                <div class="module_content">
                                    <h3>Giải Pháp Tự Động Hoá Nội Dung Từ Dữ Liệu Đa Nền Tảng</h3>
            </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-30">
                            <div class="module_card">
                                <div class="module_number">2</div>
                                <div class="module_content">
                                    <h3>Tự động Đăng tin và Đăng bài Đa Kênh</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-30">
                            <div class="module_card">
                                <div class="module_number">3</div>
                                <div class="module_content">
                                    <h3>Đồng bộ dữ liệu Lead và CRM</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-30">
                            <div class="module_card">
                                <div class="module_number">4</div>
                                <div class="module_content">
                                    <h3>Video AI For Youtube, Tiktok Automation</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-30">
                            <div class="module_card">
                                <div class="module_number">5</div>
                                <div class="module_content">
                                    <h3>Chatbot Truy Xuất Kiến Thức Lưu Trữ</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="benefits_section">
    <div class="container">
        <div class="section_title text-center mb-40">
            <h2>ƯU ĐÃI KHI ĐĂNG KÝ KHOÁ HỌC</h2>
                </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-15">
                <div class="benefit_card">
                    <div class="benefit_number">01</div>
                    <h3 class="benefit_title">Được nhận Video Record xem lại trọn đời.</h3>
                    <p class="benefit_description">Cấp tài khoản đăng nhập trên hệ thống học Online trọn đời.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-15">
                <div class="benefit_card">
                    <div class="benefit_number">02</div>
                    <h3 class="benefit_title">Tham gia Group học tập & Hỗ trợ</h3>
                    <p class="benefit_description">Cập nhật tin tức về AI & Automation liên tục.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-15">
                <div class="benefit_card">
                    <div class="benefit_number">03</div>
                    <h3 class="benefit_title">Update Kiến thức & Giải pháp mới liên tục</h3>
                    <p class="benefit_description">Bạn sẽ nhận ưu đãi 40% Template Giải Pháp trên Store.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="levels_section">
    <div class="container">
        <div class="section_title text-center mb-40">
            <h2>NỘI DUNG KHOÁ HỌC SẼ BAO GỒM BA CẤP ĐỘ</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-15">
                <div class="level_card">
                    <div class="level_header">
                        <h3>Cấp độ 1: Làm quen với AI Automation</h3>
                    </div>
                    <div class="level_content">
                        <ul class="level_list">
                            <li><i class="ti-check"></i> Hiểu cách AI giúp bạn tiết kiệm thời gian bằng cách tự động hóa các công việc lặp đi lặp lại.</li>
                            <li><i class="ti-check"></i> Thiết lập quy trình tự động hoá đơn giản như gửi Email, cập nhật dữ liệu trên Google Sheets chỉ với vài thao tác.</li>
                            <li><i class="ti-check"></i> Kết nối AI với các công cụ quen thuộc, giúp giảm bớt việc nhập liệu thủ công.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-15">
                <div class="level_card">
                    <div class="level_header">
                        <h3>Cấp độ 2: Tăng cường khả năng tự động hóa</h3>
                    </div>
                    <div class="level_content">
                        <ul class="level_list">
                            <li><i class="ti-check"></i> Bắt đầu tư duy như một người thiết kế quy trình làm việc thông minh.</li>
                            <li><i class="ti-check"></i> Đồng bộ và liên kết các hệ thống – không còn cảnh "công cụ này không nói chuyện được với công cụ kia".</li>
                            <li><i class="ti-check"></i> Bắt đầu thử nghiệm những ý tưởng mới với những luồng tự động hóa việc quản lý công việc hằng ngày.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-15">
                <div class="level_card">
                    <div class="level_header">
                        <h3>Cấp độ 3: Tự động hóa nâng cao</h3>
                    </div>
                    <div class="level_content">
                        <ul class="level_list">
                            <li><i class="ti-check"></i> Kết nối AI với các phần mềm khác để tạo hệ thống tự động hóa mạnh mẽ hơn.</li>
                            <li><i class="ti-check"></i> Giảm thiểu sai sót, tối ưu hiệu suất bằng cách thiết kế workflow thông minh.</li>
                            <li><i class="ti-check"></i> Ứng dụng AI & API để nâng cấp quy trình kinh doanh, giúp bạn tiết kiệm hàng giờ làm việc mỗi ngày.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="cta_container text-center mt-20">
            <a href="{{ route('course') }}" class="btn_register">Đăng Ký Ngay</a>
        </div>
    </div>
</section>

<style>
/* Course Content Section */
.about_section, .benefits_section, .levels_section {
    background-color: #1a103c;
    padding: 15px 0;
}

.module_card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 8px;
    height: 100%;
    display: flex;
    align-items: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    margin-bottom: 8px;
}

.benefit_card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 15px;
    height: 100%;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    margin-bottom: 10px;
}

.benefit_number {
    font-size: 48px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 15px;
    line-height: 1;
    transition: all 0.3s ease;
}

.benefit_title {
    font-size: 20px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 10px;
    position: relative;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.level_header {
    background: linear-gradient(45deg, rgba(205, 156, 255, 0.2), rgba(156, 85, 255, 0.2));
    padding: 10px 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.level_header h3 {
    color: #ffffff;
    font-size: 20px;
    font-weight: 700;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    letter-spacing: 0.3px;
}

.level_content {
    padding: 10px 15px;
}

.level_list li {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
    color: #ffffff;
    font-size: 15px;
    line-height: 1.6;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
}

.level_list li i {
    color: #f0ddff;
    margin-right: 10px;
    margin-top: 4px;
    flex-shrink: 0;
    filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.4));
}

.cta_container {
    margin-top: 30px;
}
</style>
<!-- learning part end-->


<!-- member_counter counter end -->

<!--::review_part start::-->
<style>
/* Modern Card Effects and Animations */
.course-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    margin-bottom: 15px;
    border: 1px solid rgba(0,0,0,0.05);
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(108,92,231,0.1);
}

.course-image {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.course-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.2) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.course-card:hover .course-image::after {
    opacity: 1;
}

.course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.course-card:hover .course-image img {
    transform: scale(1.06);
}

.course-category {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(155, 89, 182, 0.95) !important;
    color: white;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    z-index: 2;
    backdrop-filter: blur(4px);
    box-shadow: 0 4px 10px rgba(155, 89, 182, 0.2) !important;
    transition: all 0.3s ease;
}

.course-card:hover .course-category {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(155, 89, 182, 0.3) !important;
}

.course-content {
    padding: 15px;
}

.course-title {
    font-size: 16px;
    font-weight: 600;
    line-height: 1.3;
    margin-bottom: 5px;
    color: #1a103c;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: auto;
    max-height: 42px;
}

.course-description {
    margin: 5px 0;
    max-height: 38px;
}

.course-price {
    margin-bottom: 8px;
}

.course-meta {
    margin-top: 8px;
    padding-top: 8px;
}

.course-card:hover .course-title {
    color: #9b59b6 !important;
}

.course-description {
    color: #444;
    font-size: 14px;
    line-height: 1.5;
    margin: 10px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: auto;
    max-height: 42px;
}

.course-price {
    font-size: 18px;
    font-weight: 600;
    color: #9b59b6 !important;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    position: relative;
}

.course-price .discount-price {
    margin-right: 25px;
}

.course-price .original-price {
    font-size: 14px;
    color: #636e72;
    text-decoration: line-through;
}


.course-meta {
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(0,0,0,0.06);
}

.instructor {
    display: flex;
    align-items: center;
}

.instructor-info {
    display: flex;
    flex-direction: column;
}

.instructor-info .instructor-label {
    font-size: 12px;
    color: #636e72;
    margin-bottom: 2px;
}

.instructor-info .instructor-name {
    font-size: 13px;
    font-weight: 600;
    color: #2d3436;
}

.rating {
    display: flex;
    align-items: center;
    background: rgba(155, 89, 182, 0.08) !important;
    padding: 3px 10px;
    border-radius: 15px;
}

.rating .rating-score {
    font-size: 13px;
    font-weight: 600;
    color: #9b59b6 !important;
    margin-left: 3px;
}

/* Feature Section Enhancement */
.single_feature {
    padding: 25px;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    border: 1px solid rgba(0,0,0,0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.single_feature:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(108,92,231,0.1);
}

.single_feature_part {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.single_feature_part h4 {
    font-size: 18px;
    margin: 15px 0 10px;
    flex-grow: 0;
}

.single_feature_part p {
    margin: 0;
    flex-grow: 1;
    font-size: 14px;
    line-height: 1.5;
}

.single_feature_icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(155, 89, 182, 0.1) !important;
    border-radius: 12px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.single_feature:hover .single_feature_icon {
    background: #9b59b6 !important;
    color: white;
    transform: scale(1.08);
}

/* Button Enhancement */
.btn_1 {
    padding: 10px 25px;
    border-radius: 25px;
    background: #b76dd4 !important;
    color: white !important;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: 2px solid #b76dd4 !important;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(183, 109, 212, 0.3);
}

.btn_1:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(183, 109, 212, 0.4) !important;
    background: #c686e0 !important;
}

.btn_1::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 120%;
    height: 0;
    padding-bottom: 120%;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    opacity: 0;
    transition: transform 0.6s, opacity 0.3s;
}

.btn_1:hover::after {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}

/* Section Title Enhancement */
.section_tittle {
    margin-bottom: 30px;
    position: relative;
}

.section_tittle h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    position: relative;
    color: #ffffff;
    line-height: 1.3;
    display: inline-block;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.section_tittle h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    height: 3px;
    width: 60%;
    background: #b76dd4;
    border-radius: 2px;
    transition: width 0.3s ease;
}

.section_tittle:hover h2::after {
    width: 100%;
}

.section_tittle p {
    color: #cb9dff;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 13px;
    margin-bottom: 8px;
}

/* Banner Enhancement */
.banner_part {
    padding: 5px 0;
    position: relative;
    overflow: hidden;
}

.banner_text {
    position: relative;
    z-index: 1;
}

.banner_text_iner h5 {
    color: #cb9dff !important;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 5px;
    animation: fadeInUp 0.6s ease;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 18px;
}

.banner_text_iner h1 {
    font-size: 42px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 8px;
    animation: fadeInUp 0.8s ease;
    color: #ffffff;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    background: linear-gradient(to right, #ffffff, #dfbcff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.banner_text_iner p {
    font-size: 16px;
    line-height: 1.6;
    color: #e5e0ff;
    margin-bottom: 15px;
    animation: fadeInUp 1s ease;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
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

.feature_part .row {
    display: flex;
    flex-wrap: wrap;
}

.feature_part .col-sm-6 {
    margin-bottom: 25px;
    display: flex;
}

.single_feature_text {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.single_feature_text h2 {
    margin-bottom: 15px;
}

.single_feature_text p {
    margin-bottom: 20px;
}

.single_feature_text .btn_1 {
    align-self: flex-start;
    margin-top: auto;
}

/* Giảm khoảng cách giữa các row */
.row {
    margin-bottom: 5px;
}

.course_modules .row {
    margin-left: -15px;
    margin-right: -15px;
}

.course_modules .col-md-4,
.course_modules .col-md-6 {
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: 20px;
}

.module_number {
    font-size: 26px;
    font-weight: 800;
    color: #f0ddff;
    background: rgba(205, 156, 255, 0.2);
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    flex-shrink: 0;
    transition: all 0.3s ease;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 15px rgba(205, 156, 255, 0.2);
}

.module_card:hover .module_number {
    background: rgba(205, 156, 255, 0.3);
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(205, 156, 255, 0.4);
}

.module_content h3 {
    font-size: 20px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
    line-height: 1.4;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    letter-spacing: 0.3px;
}

.level_header {
    background: linear-gradient(45deg, rgba(205, 156, 255, 0.2), rgba(156, 85, 255, 0.2));
    padding: 10px 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.level_card {
    background: rgba(255, 255, 255, 0.07);
    border-radius: 16px;
    height: 100%;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    transition: all 0.3s ease;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    margin-bottom: 8px;
}

.section_title h2 {
    font-size: 32px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 15px;
    line-height: 1.3;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.section_title .subtitle {
    font-size: 16px;
    color: #dfbcff;
    max-width: 700px;
    margin: 0 auto;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.benefit_card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 12px;
    height: 100%;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    margin-bottom: 8px;
}
</style>

<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Danh sách khóa học</p>
                    <h2>Khóa học mới nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($courses as $course)
            <div class="col-sm-6 col-lg-4 mb-15">
                <div class="course-card">
                    <div class="course-image">
                        @if($course->categories->isNotEmpty())
                            <div class="course-category">{{ $course->categories->first()->name }}</div>
                        @endif
                        @if($course->thumbnail)
                            <img src="{{ env('APP_URL') . '/storage/app/public/' . $course->thumbnail }}" alt="{{ $course->title }}">
                        @else
                            <img src="{{ asset('assets/img/special_cource_1.png') }}" alt="{{ $course->title }}">
                        @endif
                    </div>
                    <div class="course-content">
                      <a href="{{ route('course-detail', $course->slug) }}"><h3 class="course-title">{{ $course->title }}</h3></a>
                        <p class="course-description">{{ $course->short_description }}</p>
                        <div class="course-price">
                            @if($course->regular_price && $course->getCurrentPrice() < $course->regular_price)
                                <span class="discount-price">{{ number_format($course->sale_price, 0, ',', '.') }} VND</span>
                                <span class="original-price"><del>{{ number_format($course->regular_price, 0, ',', '.') }} VND</del></span>
                            @else
                                <span class="discount-price">{{ number_format($course->getCurrentPrice(), 0, ',', '.') }} VND</span>
                            @endif
                        </div>
                        <div class="course-meta">


                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--::blog_part end::-->

<!-- registration_section start -->
<section class="registration_section">
    <div class="container">
        <div class="registration_container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="registration_box">
                        <div class="registration_header text-center">
                            <h2>TỰ ĐỘNG HÓA <br><span class="text_highlight">AI AUTOMATION</span></h2>
                            <p class="subtitle">Xây Dựng Quy Trình Tự ĐỘNG HÓA TỪ CƠ BẢN ĐẾN NÂNG CAO</p>
                        </div>

                        <div class="registration_pricing">
                            <div class="price_container">
                                <div class="price_column">
                                    <div class="price_label">Đăng ký sớm - giảm 70%:</div>
                                    <div class="price_value">2.999.000 VNĐ</div>
                                </div>
                                <div class="price_column">
                                    <div class="price_label">Giá chính thức:</div>
                                    <div class="price_value original">9.999.000 VNĐ</div>
                                </div>
                            </div>

                            <div class="price_info text-center">
                                <p>⏰ THỜI GIAN BẮT ĐẦU TỪ 10/02/2025</p>
                            </div>
                        </div>

                        <div style="height: 10px;"></div>

                        <div class="countdown-container text-center">
                            <div class="countdown-title mb-10">Thời gian ưu đãi còn lại:</div>
                            <div class="reg-countdown-wrapper">
                                <div class="reg-countdown-item">
                                    <div class="reg-countdown-digit" id="reg_days">00</div>
                                    <div class="reg-countdown-label">NGÀY</div>
                                </div>
                                <div class="reg-countdown-item">
                                    <div class="reg-countdown-digit" id="reg_hours">00</div>
                                    <div class="reg-countdown-label">GIỜ</div>
                                </div>
                                <div class="reg-countdown-item">
                                    <div class="reg-countdown-digit" id="reg_minutes">00</div>
                                    <div class="reg-countdown-label">PHÚT</div>
                                </div>
                                <div class="reg-countdown-item">
                                    <div class="reg-countdown-digit" id="reg_seconds">00</div>
                                    <div class="reg-countdown-label">GIÂY</div>
                                </div>
                            </div>
                        </div>

                        <div class="registration_cta text-center mt-15">
                            <a href="{{ route('course') }}" class="btn_register">ĐĂNG KÝ NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Registration Section */
.registration_section {
    background-color: #1a103c;
    padding: 15px 0;
    position: relative;
    overflow: hidden;
}

.registration_section::before {
    content: '';
    position: absolute;
    width: 600px;
    height: 600px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(155, 89, 182, 0.1) 0%, rgba(26, 16, 60, 0) 70%);
    top: -300px;
    right: -300px;
    z-index: 0;
}

.registration_section::after {
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(155, 89, 182, 0.1) 0%, rgba(26, 16, 60, 0) 70%);
    bottom: -200px;
    left: -200px;
    z-index: 0;
}

.registration_container {
    position: relative;
    z-index: 1;
}

.registration_box {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 20px;
    padding: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.registration_header {
    margin-bottom: 10px;
}

.registration_header h2 {
    font-size: 32px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 10px;
    line-height: 1.2;
}

.registration_header .subtitle {
    font-size: 18px;
    color: #e9e6ff;
    margin-bottom: 0;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.registration_pricing {
    margin-bottom: 15px;
}

.price_container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 10px;
}

.price_column {
    text-align: center;
}

.price_label {
    font-size: 16px;
    color: #e9e6ff;
    margin-bottom: 5px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.price_value {
    font-size: 32px;
    font-weight: 800;
    color: #dfbcff;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

.price_value.original {
    color: #b7adde;
    text-decoration: line-through;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.price_info {
    color: #dfbcff;
    font-size: 14px;
    font-weight: 600;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.registration_cta {
    margin-top: 15px;
}

@media (max-width: 991px) {
    .registration_section {
        padding: 60px 0;
    }

    .registration_box {
        padding: 30px 20px;
    }

    .registration_header h2 {
        font-size: 28px;
    }

    .price_container {
        flex-direction: column;
        gap: 20px;
    }
}
</style>

<script>
// Set the date we're counting down to for registration section (same as the banner)
const regCountDownDate = countDownDate;

// Update the registration countdown every 1 second
const regCountdown = setInterval(function() {
    // Get today's date and time
    const now = new Date().getTime();

    // Find the distance between now and the countdown date
    const distance = regCountDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result
    document.getElementById("reg_days").innerHTML = days < 10 ? "0" + days : days;
    document.getElementById("reg_hours").innerHTML = hours < 10 ? "0" + hours : hours;
    document.getElementById("reg_minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
    document.getElementById("reg_seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

    // If the countdown is finished, write some text
    if (distance < 0) {
        clearInterval(regCountdown);
        document.getElementById("reg_days").innerHTML = "00";
        document.getElementById("reg_hours").innerHTML = "00";
        document.getElementById("reg_minutes").innerHTML = "00";
        document.getElementById("reg_seconds").innerHTML = "00";
    }
}, 1000);
</script>
<!-- registration_section end -->

<style>
.reg-countdown-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 8px;
    gap: 5px;
}

.reg-countdown-item {
    min-width: 60px;
    background-color: #251552;
    border-radius: 12px;
    padding: 8px 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.reg-countdown-digit {
    font-size: 24px;
    font-weight: 700;
    color: #dfbcff;
    margin-bottom: 2px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}

.reg-countdown-label {
    font-size: 12px;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}
</style>

<script>
// Update the countdown every 1 second
const x = setInterval(function() {
    // Get today's date and time
    const now = new Date().getTime();

    // Find the distance between now and the countdown date
    const distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result
    document.getElementById("days").innerHTML = days < 10 ? "0" + days : days;
    document.getElementById("hours").innerHTML = hours < 10 ? "0" + hours : hours;
    document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
    document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;

    // If the countdown is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
    }
}, 1000);
</script>

@endsection



