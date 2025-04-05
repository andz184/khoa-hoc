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
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;

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

.about_content .text_highlight {
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

.section_tittle h2 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    position: relative;
    line-height: 1.3;
    display: inline-block;
}

.section_tittle p {
    color: #cb9dff;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 13px;
    margin-bottom: 8px;
}

/* Responsive Adjustments */
@media (max-width: 1199px) {
    .banner_text_iner h1 {
        font-size: 36px;
    }

    .feature_text_area h2,
    .about_content .section_tittle h2,
    .section_tittle h2 {
        font-size: 28px;
    }

    .about_card {
        min-height: 350px;
    }

    .about_content {
        padding: 40px 30px;
    }
}

@media (max-width: 991px) {
    .banner_part {
        padding: 40px 0;
    }

    .banner_part .row {
        flex-direction: column-reverse;
    }

    .banner_text {
        text-align: center;
        padding: 30px 15px;
    }

    .banner_text_iner h1 {
        font-size: 32px;
    }

    .banner_video {
        margin-top: 10px;
        margin-bottom: 30px;
    }

    .banner_video video {
        max-width: 100%;
        margin: 0 auto;
        margin-bottom: 0;
    }

    .feature_text_area {
        text-align: center;
        padding-right: 0;
        margin-bottom: 30px;
    }

    .feature_text_area h2::after {
        left: 50%;
        transform: translateX(-50%);
    }

    .feature_btn {
        margin: 10px auto 30px;
        display: inline-block;
        max-width: 220px;
    }

    .about_card {
        flex-direction: column;
    }

    .about_illustration,
    .about_content {
        flex: 0 0 100%;
    }

    .about_illustration {
        height: 250px;
        order: 1;
    }

    .about_content {
        padding: 30px 25px;
        order: 2;
        text-align: center;
    }

    .about_content .section_tittle h2::after {
        left: 50%;
        transform: translateX(-50%);
    }
}

@media (max-width: 767px) {
    .banner_text_iner h1 {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .banner_text_iner p {
        font-size: 14px;
        margin-bottom: 20px;
    }

    .feature_text_area h2,
    .about_content .section_tittle h2,
    .section_tittle h2 {
        font-size: 24px;
    }

    .course-card {
        max-width: 400px;
        margin: 0 auto 25px;
    }

    .course-image {
        height: 180px;
    }

    .course-content {
        padding: 15px;
    }
}

@media (max-width: 575px) {
    .banner_part {
        padding: 25px 0;
    }

    .banner_text_iner h5 {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .banner_text_iner h1 {
        font-size: 24px;
        margin-bottom: 12px;
    }

    .banner_text_iner p {
        margin-bottom: 15px;
    }

    .feature_text_area h2,
    .about_content .section_tittle h2,
    .section_tittle h2 {
        font-size: 22px;
        margin-bottom: 15px;
    }

    .feature_card {
        margin-bottom: 25px;
        padding: 20px 15px;
    }

    .about_section {
        padding: 40px 0;
    }

    .about_card {
        min-height: auto;
    }

    .about_illustration {
        height: 180px;
    }

    .about_content {
        padding: 25px 20px;
    }

    .about_description {
        font-size: 14px;
        margin-bottom: 15px;
    }

    .course-title {
        font-size: 16px;
    }

    .course-description {
        font-size: 13px;
        margin: 8px 0;
    }

    .course-price {
        margin-bottom: 8px;
    }

    .special_cource.padding_top {
        padding-top: 40px;
    }

    .section_tittle {
        margin-bottom: 25px;
    }
}

/* Additional small screen improvements */
@media (max-width: 400px) {
    /* Improve smallest screen sizes */
    .banner_text_iner h1 {
        font-size: 20px;
        line-height: 1.3;
    }

    .banner_text_iner h5 {
        font-size: 13px;
    }

    .banner_text_iner p {
        font-size: 13px;
        line-height: 1.5;
    }

    .feature_btn {
        padding: 10px 20px;
        font-size: 14px;
        width: 100%;
        max-width: 100%;
        text-align: center;
    }

    /* Better two-column layout for extra small screens */
    .col-6.col-md-6.col-lg-3 {
        padding-left: 8px;
        padding-right: 8px;
    }

    .feature_card {
        padding: 15px 10px;
    }

    .feature_title {
        font-size: 16px;
        margin: 10px 0;
    }

    .feature_description {
        font-size: 13px;
        line-height: 1.4;
    }

    /* Better about section on smallest screens */
    .about_content {
        padding: 20px 15px;
    }

    .about_content .section_tittle h2 {
        font-size: 20px;
        line-height: 1.3;
    }

    /* Course cards for smallest screens */
    .card-title.fw-bold {
        font-size: 16px !important;
    }

    .card-text.small {
        font-size: 12px !important;
    }
}

/* Responsive image heights for course cards */
@media (max-width: 767px) {
    .card-img-top {
        height: 160px !important;
    }
}

@media (max-width: 480px) {
    .card-img-top {
        height: 140px !important;
    }
}

/* Ensure space above sections */
.special_cource.padding_top {
    padding-top: 40px;
    padding-bottom: 20px;
}

/* Ensure container is always centered */
.container {
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 15px;
    padding-right: 15px;
}

/* Make sure rows have proper spacing */
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

/* Ensure all columns have proper padding */
[class*="col-"] {
    padding-right: 15px;
    padding-left: 15px;
    width: 100%;
}

/* Fix h1 text breaking on small screens */
@media (max-width: 480px) {
    .banner_text_iner h1 {
        font-size: 22px;
        word-break: normal;
        overflow-wrap: break-word;
    }

    .feature_card img {
        max-width: 150px;
    }

    .course-card {
        max-width: 100%;
    }

    .course-image {
        height: 160px;
    }
}

/* Cải thiện hiệu ứng gradient text */
.text_highlight, .feature_text_area .text_highlight, .about_content .text_highlight {
    background-image: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-fill-color: transparent;
    color: #b76dd4; /* Fallback color */
    display: inline-block;
    font-weight: 800;
    position: relative;
    padding: 0;
}

/* Fix cho Safari và iOS */
@media screen and (-webkit-min-device-pixel-ratio: 0) {
    .text_highlight, .feature_text_area .text_highlight, .about_content .text_highlight {
        background-image: linear-gradient(to right, #e0a2ff, #ffcd4a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
}

/* Fallback cho các trình duyệt không hỗ trợ gradient */
@supports not (background-clip: text) {
    .text_highlight, .feature_text_area .text_highlight, .about_content .text_highlight {
        color: #b76dd4;
        background: none;
    }
}

/* CSS cho editor_illustration */
.editor_illustration {
    position: relative;
    width: 100%;
    height: 300px;
    max-width: 400px;
    margin: 0 auto;
}

.page_outline {
    position: absolute;
    top: 10%;
    left: 10%;
    width: 80%;
    height: 80%;
    border: 2px dashed #e0a2ff;
    border-radius: 10px;
    opacity: 0.8;
    z-index: 1;
}

.dash_border {
    position: absolute;
    top: 5%;
    left: 5%;
    width: 90%;
    height: 90%;
    border: 2px solid #ffcd4a;
    border-radius: 10px;
    z-index: 0;
}

.editor_window {
    position: absolute;
    top: 20%;
    left: 15%;
    width: 70%;
    height: 60%;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    padding: 15px;
    z-index: 2;
}

.list_item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.check_icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    background: #e0a2ff;
    color: white;
    border-radius: 50%;
    margin-right: 10px;
}

.line {
    height: 8px;
    background: #f0f0f0;
    flex-grow: 1;
    border-radius: 4px;
}

.chat_bubble {
    position: absolute;
    top: 15%;
    right: 10%;
    width: 40px;
    height: 40px;
    background: #ffcd4a;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 3;
    box-shadow: 0 5px 15px rgba(255,205,74,0.3);
    animation: float 3s ease-in-out infinite;
}

.green_checkmark {
    position: absolute;
    bottom: 20%;
    right: 20%;
    width: 30px;
    height: 30px;
    background: #4cd964;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 3;
    box-shadow: 0 5px 15px rgba(76,217,100,0.3);
    animation: float 4s ease-in-out infinite;
}

.circle_element {
    position: absolute;
    top: 70%;
    left: 10%;
    width: 50px;
    height: 50px;
    border: 3px solid #e0a2ff;
    border-radius: 50%;
    z-index: 3;
    animation: float 5s ease-in-out infinite;
}

.dotted_line {
    position: absolute;
    background: linear-gradient(to right, #e0a2ff 50%, transparent 50%);
    background-size: 10px 2px;
    background-repeat: repeat-x;
    z-index: 1;
}

.dotted_line.horizontal {
    height: 2px;
    width: 100px;
    top: 60%;
    left: 40%;
    animation: float 4s ease-in-out infinite;
}

.dotted_line.vertical {
    width: 2px;
    height: 100px;
    top: 40%;
    left: 80%;
    background: linear-gradient(to bottom, #e0a2ff 50%, transparent 50%);
    background-size: 2px 10px;
    background-repeat: repeat-y;
    animation: float 3.5s ease-in-out infinite;
}

@keyframes float {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0);
    }
}
</style>
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5 class="mb-2 mb-md-3">Biến đam mê công nghệ thành kỹ năng thực tiễn</h5>
                        <h1 class="mb-2 mb-md-3">Xây dựng AI tự động hoá <span class="highlight">từ Cơ bản đến Nâng cao</span></h1>
                        <p class="mb-3 mb-md-4">Trong khóa học này, anh/chị không chỉ được học về cách <span class="text-emphasis">ứng dụng AI vào thực tế</span>, mà còn học về
                            <span class="text-emphasis">tự động hoá</span> và kết nối 2 công nghệ mạnh mẽ nhất với nhau để xây dựng các <span class="text-emphasis">Hệ thống AI
                            Automation</span> <span class="text-highlight">VƯỢT XA SỨC TƯỞNG TƯỢNG</span> của nhiều người.</p>
                        <a href="{{ route('course') }}" class="feature_btn d-inline-block">Xem Tất Cả Khóa Học</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="banner_video">
                    <div class="rounded overflow-hidden shadow">
                        <video autoplay loop muted playsinline class="w-100">
                            <source src="https://n8niostorageaccount.blob.core.windows.net/n8nio-strapi-blobs-stage/assets/ai_hero_v2_vp9_82cf7a8e6a.webm" type="video/webm">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3 mb-4">
                <div class="feature_text_area text-center text-lg-start">
                    <div class="section_tittle">
                        <h2 class="mb-3">Tại sao chọn <span class="text_highlight">KhoaHocAI.Pro?</span></h2>
                    </div>
                    <p class="mb-3 mb-md-4">Khoá học được xây dựng bởi các chuyên gia có cả năng lực về ứng dụng và xây dựng các sản phẩm AI.</p>
                    <a href="{{ route('course') }}" class="feature_btn d-inline-block">Xem Tất Cả Khóa Học</a>
                </div>
            </div>

            <div class="col-12 col-lg-3 mb-4">
                <div class="feature_card h-100">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <img src="{{asset('assets/img/anh169.png')}}" alt="Cho người mới" class="img-fluid" style="max-width: 180px;">
                        </div>
                        <h4 class="feature_title">Cho người mới bắt đầu</h4>
                        <p class="feature_description">Phù hợp cho người mới bắt đầu lẫn chuyên gia muốn nâng cao kỹ năng.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 mb-4">
                <div class="feature_card h-100">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <img src="{{asset('assets/img/anh168.png')}}" alt="Chuyên gia nâng cao" class="img-fluid" style="max-width: 180px;">
                        </div>
                        <h4 class="feature_title">Nâng cao kỹ năng AI</h4>
                        <p class="feature_description">Kiến thức chuyên sâu giúp chuyên gia nâng cao khả năng tạo ứng dụng AI chất lượng.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 mb-4">
                <div class="feature_card h-100">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <img src="{{asset('assets/img/anh167.png')}}" alt="Hỗ trợ" class="img-fluid" style="max-width: 180px;">
                        </div>
                        <h4 class="feature_title">Hỗ trợ toàn diện</h4>
                        <p class="feature_description">Đội ngũ giảng viên luôn sẵn sàng giải đáp thắc mắc và hỗ trợ kể cả trong thời gian học và sau khi hoàn thành khóa học.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature_part end-->

<!-- learning part with responsive improvements -->
<section class="about_section py-5">
    <div class="container">
        <div class="about_card">
            <div class="row g-0">
                <div class="col-md-5 p-0">
                    <div class="about_illustration h-100 d-flex align-items-center justify-content-center">
                        <div class="editor_illustration">
                            <div class="page_outline"></div>
                            <div class="dash_border"></div>
                            <div class="editor_window">
                                <div class="list_item">
                                    <div class="check_icon"><i class="fas fa-check"></i></div>
                                    <div class="line"></div>
                                </div>
                                <div class="list_item">
                                    <div class="check_icon"><i class="fas fa-check"></i></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div class="chat_bubble"><i class="fas fa-comment"></i></div>
                            <div class="green_checkmark"><i class="fas fa-check"></i></div>
                            <div class="circle_element"></div>
                            <div class="dotted_line horizontal"></div>
                            <div class="dotted_line vertical"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 p-0">
                    <div class="about_content h-100">
                        <div class="section_tittle mb-3">
                            <h2 class="mb-3">
                                <span class="text_highlight">Nơi Kiến Tạo Tương Lai</span>
                                Cùng
                                <span class="text_highlight">Trí Tuệ Nhân Tạo</span>
                            </h2>
                        </div>
                        <p class="about_description">Tại KhoaHocAI.Pro, chúng tôi tự hào mang đến các khóa học AI được xây dựng bởi đội ngũ chuyên gia hàng đầu, những người không chỉ sở hữu năng lực vượt trội trong việc ứng dụng AI.</p>
                        <p class="about_description mb-4">Chúng tôi cam kết cung cấp nội dung cập nhật mới nhất, giúp bạn nắm bắt cách ứng dụng công nghệ AI tiên tiến và tự tay xây dựng các AI Agent từ con số 0.</p>
                        <a href="{{ route('course') }}" class="feature_btn d-inline-block">Xem Tất Cả Khóa Học</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
