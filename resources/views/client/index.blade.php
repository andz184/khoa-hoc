@extends('layouts.client')

@section('title', 'Khóa học AI')

@section('content')

<!-- banner part start-->
<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap');

* {
    box-sizing: border-box;
    font-family: 'Be Vietnam Pro', sans-serif;
}

body {
    background-color: #1a103c;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236a4c93' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    overflow-x: hidden;
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

.banner_part {
    position: relative;
    overflow: hidden;
    padding: 60px 0;
    width: 100%;
    background: none !important;
}

.banner_video {
    position: relative;
    z-index: 2;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.banner_video video {
    border-radius: 15px;
    position: relative;
    z-index: 1;
    width: 100%;
    height: auto;
    display: block;
    max-width: 100%;
    padding-bottom: 250px;
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
    padding: 30px 0;
}

.banner_text_iner {
    width: 100%;
    max-width: 100%;
}

.banner_text_iner h5 {
    color: #cb9dff !important;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 15px;
    animation: fadeInUp 0.6s ease;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 16px;
}

.banner_text_iner h1 {
    font-size: 42px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
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
    line-height: 1.7;
    color: #e5e0ff;
    margin-bottom: 25px;
    animation: fadeInUp 1s ease;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.feature_btn {
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
    margin-top: 10px;
}

.feature_btn:hover {
    background: #352863 !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 0 15px rgba(125, 75, 170, 0.5) !important;
}

.feature_btn::after {
    display: none;
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

/* Feature Cards Styling */
.feature_part {
    background-color: #1a103c;
    position: relative;
    overflow: hidden;
    padding: 80px 0;
}

.feature_text_area {
    padding-right: 30px;
}

.feature_text_area h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.3;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    position: relative;
    display: inline-block;
    color: #ffffff;
}

.feature_text_area .text_highlight {
    background-image: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-fill-color: transparent;
    color: #b76dd4;
    display: inline-block;
    font-weight: 800;
    position: relative;
    padding: 0;
}

.feature_text_area h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    height: 3px;
    width: 60%;
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    border-radius: 2px;
    transition: width 0.3s ease;
}

.feature_text_area:hover h2::after {
    width: 100%;
}

.feature_text_area p {
    font-size: 16px;
    line-height: 1.7;
    color: #d8d5ed;
    margin-bottom: 25px;
}

.feature_card {
    background-color: #ffffff;
    border-radius: 16px;
    padding: 25px 20px;
    margin-bottom: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    height: 100%;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    transition: all 0.4s ease;
    overflow: hidden;
    position: relative;
    border: 1px solid rgba(231, 221, 255, 0.1);
}

.feature_card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 0;
    background: linear-gradient(to bottom, #e0a2ff, #ffcd4a);
    transition: height 0.4s ease;
}

.feature_card:hover::before {
    height: 100%;
}

.feature_card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(155, 89, 182, 0.2);
}

.feature_icon_wrapper {
    width: 100%;
    text-align: center;
}

.feature_icon {
    width: 100%;
    margin-bottom: 15px;
    position: relative;
    z-index: 1;
}

.feature_card img {
    width: 100%;
    height: auto;
    max-width: 200px;
    display: block;
    margin: 0 auto;
    transition: transform 0.5s ease;
}

.feature_card:hover img {
    transform: scale(1.08);
}

.feature_title {
    font-size: 18px;
    font-weight: 700;
    color: #1a103c;
    margin: 15px 0;
    text-align: center;
    transition: color 0.3s ease;
    font-family: 'Be Vietnam Pro', sans-serif;
}

.feature_card:hover .feature_title {
    color: #9b59b6;
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.feature_description {
    font-size: 15px;
    line-height: 1.6;
    color: #636e72 !important;
    text-align: center;
    margin-top: 10px;
    font-weight: 400;
    font-family: 'Be Vietnam Pro', sans-serif;
}

/* About Section Styling */
.about_section {
    background-color: #1a103c;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236a4c93' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.about_container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 15px;
    position: relative;
    z-index: 1;
}

.about_card {
    background-color: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    display: flex;
    min-height: 400px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.about_illustration {
    flex: 0 0 50%;
    padding: 40px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f1eeff;
}

.about_content {
    flex: 0 0 50%;
    padding: 60px 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.about_content .section_tittle h2 {
    font-size: 32px;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 25px;
    line-height: 1.3;
}

.text_highlight {
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-fill-color: transparent;
    color: #b76dd4;
    display: inline-block;
    font-weight: 800;
    position: relative;
    padding: 0;
}

.about_description {
    font-size: 16px;
    line-height: 1.7;
    color: #636e72;
    margin-bottom: 20px;
}

/* Course Card Styling */
.course-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    margin-bottom: 25px;
    border: 1px solid rgba(0,0,0,0.05);
    height: 100%;
    display: flex;
    flex-direction: column;
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

.course-content {
    padding: 18px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.course-title {
    font-size: 17px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 6px;
    color: #1a103c;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: auto;
    max-height: 48px;
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
    flex-grow: 1;
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

/* Section Title Styling */
.section_tittle {
    margin-bottom: 30px;
    position: relative;
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
    padding: 50px 0;
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
    margin-bottom: 15px;
    animation: fadeInUp 0.6s ease;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    font-size: 16px;
}

.banner_text_iner h1 {
    font-size: 42px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
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
    line-height: 1.7;
    color: #e5e0ff;
    margin-bottom: 25px;
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
    margin-bottom: 15px;
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
            <div class="col-sm-6 col-lg-4">
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

@endsection
