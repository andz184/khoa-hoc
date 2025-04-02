@extends('layouts.client')

@section('title', 'Khóa Học - Khoá Học AI')

@section('content')

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap');

    * {
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .course-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        margin-bottom: 30px;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .course-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(108,92,231,0.1);
    }

    .course-image {
        position: relative;
        overflow: hidden;
        height: 220px;
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
        transform: scale(1.08);
    }

    .course-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(108,92,231,0.95);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 500;
        z-index: 2;
        backdrop-filter: blur(4px);
        box-shadow: 0 4px 15px rgba(108,92,231,0.2);
        transition: all 0.3s ease;
    }

    .course-card:hover .course-category {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108,92,231,0.3);
    }

    .course-content {
        padding: 20px;
    }

    .course-title {
        font-size: 18px;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 8px;
        color: #2d3436;
        transition: color 0.3s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: auto;
        max-height: 50px;
    }

    .course-description {
        color: #636e72;
        font-size: 14px;
        line-height: 1.5;
        margin: 12px 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: auto;
        max-height: 42px;
    }

    .course-price {
        font-size: 20px;
        font-weight: 600;
        color: #6c5ce7;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        position: relative;
    }

    .course-price::before {
        content: '₫';
        font-size: 14px;
        margin-right: 2px;
        font-weight: 500;
        position: absolute;
        left: -12px;
        top: 2px;
    }

    .course-meta {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid rgba(0,0,0,0.06);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .instructor {
        display: flex;
        align-items: center;
    }

    .instructor img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
        border: 2px solid #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        font-size: 14px;
        font-weight: 600;
        color: #2d3436;
    }

    .rating {
        display: flex;
        align-items: center;
        background: rgba(108,92,231,0.08);
        padding: 4px 12px;
        border-radius: 20px;
    }

    .rating .stars {
        display: flex;
        align-items: center;
    }

    .rating img {
        width: 14px;
        height: 14px;
        margin-right: 2px;
    }

    .rating .rating-score {
        font-size: 14px;
        font-weight: 600;
        color: #6c5ce7;
        margin-left: 4px;
    }

    /* Section Title Enhancement */
    .section_tittle {
        margin-bottom: 50px;
        position: relative;
        text-align: center;
    }

    .section_tittle h2 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
        color: #2d3436;
    }

    .section_tittle h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 60%;
        height: 3px;
        background: #6c5ce7;
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .section_tittle:hover h2::after {
        width: 100%;
    }

    .section_tittle p {
        color: #6c5ce7;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    /* Pagination Styling */
    .pagination {
        margin-top: 40px;
    }

    .page-link {
        border: none;
        padding: 12px 20px;
        margin: 0 5px;
        color: #636e72;
        font-weight: 500;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .page-link:hover {
        background: rgba(108,92,231,0.08);
        color: #6c5ce7;
    }

    .page-item.active .page-link {
        background: #6c5ce7;
        color: white;
        box-shadow: 0 5px 15px rgba(108,92,231,0.2);
    }

    .special_cource {
        padding: 80px 0;
        background: #f8f9fa;
    }
    .course-price {
    font-size: 20px;
    font-weight: 600;
    color: #6c5ce7;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    position: relative;
}

.course-price .discount-price {
    margin-right: 25px; /* Increased spacing between the two prices */
}

.course-price .original-price {
    font-size: 14px; /* Smaller font for the original price */
    color: #636e72; /* Lighter color for the original price */
    text-decoration: line-through; /* Ensures the strikethrough effect */
}

.course-price::before {
    content: '₫';
    font-size: 14px;
    margin-right: 2px;
    font-weight: 500;
    position: absolute;
    left: -12px;
    top: 2px;
}
    </style>




    <section class="special_cource padding_top" style="padding-top: 160px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Danh sách khóa học</p>
                        <h2>Tất cả khóa học</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-image">
                            @if($course->categories->isNotEmpty())
                                <div class="course-category">{{ $course->categories->first()->name }}</div>
                            @endif
                            @if($course->thumbnail)
                                <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}">
                            @else
                                <img src="{{ asset('assets/img/special_cource_1.png') }}" alt="{{ $course->title }}">
                            @endif
                        </div>
                        <div class="course-content">
                         <a href="{{ route('course-detail', $course->slug) }}"> <h3 class="course-title">{{ $course->title }}</h3></a>
                            <p class="course-description">{{ $course->short_description }}</p>
                            <div class="course-price">
                                @if($course->regular_price && $course->getCurrentPrice() < $course->regular_price)
                                    <!-- Giá giảm (bên trái) -->
                                    <span class="discount-price">{{ number_format($course->sale_price, 0, ',', '.') }} VND</span>
                                    <!-- Giá gốc (bên phải, nhỏ hơn, có gạch ngang) -->
                                    <span class="original-price"><del>{{ number_format($course->regular_price, 0, ',', '.') }} VND</del></span>
                                @else
                                    <!-- Chỉ hiển thị giá gốc khi không có giảm giá -->
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
            <div class="row">
                <div class="col-12">
                    <div class="pagination justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection
