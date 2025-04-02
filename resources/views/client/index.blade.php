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
    padding: 0;
    width: 100%;
    background: none !important;
}

/* Xóa mọi background image có thể có */
.banner_part::before,
.banner_part::after {
    display: none !important;
    background: none !important;
    content: none !important;
}

.banner_video {
    position: relative;
    z-index: 2;
}

.banner_video video {
    border-radius: 15px;
    position: relative;
    z-index: 1;
    width: 100%;
    height: auto;
    display: block;
    max-width: 100%;
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
}

.banner_text_iner h1,
.banner_text_iner h5,
.banner_text_iner p {
    width: 100%;
    max-width: 100%;
    word-wrap: break-word;
}

@media (max-width: 991px) {
    .banner_part {
        padding: 0;
        width: 100%;
        background: none !important;
    }
    .banner_part .container {
        padding: 0;
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
        margin-top: 60px;
        width: 100%;
    }
    .banner_video video {
        border-radius: 0;
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
    font-weight: 500;
    letter-spacing: 0.5px;
    padding: 10px 24px;
    border-radius: 25px;
    background: #6c5ce7;
    border: 2px solid #6c5ce7;
    transition: all 0.3s ease;
}

.btn_1:hover {
    background: transparent;
    color: #6c5ce7;
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
    color: #6c5ce7;
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
    color: #6c5ce7;
}

/* Giảm padding và margin giữa các section */
section {
    padding: 40px 0;
}

.feature_part {
    padding-top: 20px;
    padding-bottom: 20px;
}

.learning_part {
    padding-top: 20px;
    padding-bottom: 20px;
}

.special_cource {
    padding-top: 20px;
}

.padding_top {
    padding-top: 20px;
}

.section_tittle {
    margin-bottom: 30px;
}
</style>
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>Biến đam mê công nghệ thành kỹ năng thực tiễn</h5>
                        <h1>Xây dựng AI tự động hoá
                            từ Cơ bản đến Nâng cao</h1>
                        <p>Trong khóa học này, anh/chị không chỉ được học về cách ứng dụng AI vào thực tế, mà còn học về
                            tự động hoá và kết nối 2 công nghệ mạnh mẽ nhất với nhau để xây dựng các Hệ thống AI
                            Automation VƯỢT XA SỨC TƯỞNG TƯỢNG của nhiều người.</p>
                        <a href="" class="btn_1">Xem tất cả khóa học </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
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
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-3 align-self-center">
                <div class="single_feature_text ">
                    <h2 style="font-size: 28px;"> Tại sao chọn<br> KhoaHocAI.Pro?</h2>
                    <p>Khoá học được xây dựng bởi các chuyên gia có cả năng lực về ứng dụng và xây dựng các sản phẩm AI.
                    </p>
                    <a href="" class="btn_1"> Xem Tất cả khoá học
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-layers"></i></span>
                        <h4>Nội dung cập nhật mới nhất</h4>
                        <p>Học cách ứng dụng công nghệ AI và xây dựng các AI Agent từ con số 0.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                        <h4>Học theo lộ trình rõ ràng</h4>
                        <p>Phù hợp cho người mới bắt đầu lẫn chuyên gia muốn nâng cao kỹ năng.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                        <h4>Hỗ trợ trong và sau khoá học</h4>
                        <p> Đội ngũ giảng viên luôn sẵn sàng giải đáp thắc mắc và hỗ trợ kể trả trong thời gian học và sau khi hoàn thành khoá học</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- learning part start-->
<section class="learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-lg-stretch">
            <div class="col-md-7 col-lg-7">
                <div class="learning_img">
                    <img src="{{ asset('assets/img/learning_img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="learning_member_text">
                    <h5>Về Chúng Tôi
                    </h5>
                    <h2>Nơi Kiến Tạo Tương Lai Cùng Trí Tuệ Nhân Tạo
                    </h2>
                    <p>Tại KhoaHocAI.Pro, chúng tôi tự hào mang đến các khóa học AI được xây dựng bởi đội ngũ chuyên gia hàng đầu, những người không chỉ sở hữu năng lực vượt trội trong việc ứng dụng AI mà còn có kinh nghiệm thực tiễn trong việc phát triển các sản phẩm AI từ ý tưởng đến thực tế.
                        Chúng tôi cam kết cung cấp nội dung cập nhật mới nhất, giúp bạn nắm bắt cách ứng dụng công nghệ AI tiên tiến và tự tay xây dựng các AI Agent từ con số 0. Với sứ mệnh đồng hành cùng bạn trên hành trình làm chủ trí tuệ nhân tạo, KhoaHocAI.Pro không chỉ là nơi học tập mà còn là cộng đồng kết nối những đam mê công nghệ.
                        </p>

                    <a href="{{ route('course') }}" class="btn_1">Xem tất cả khóa học</a>
                </div>
            </div>
        </div>
    </div>
</section>
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
    margin-bottom: 25px;
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
    background: rgba(108,92,231,0.95);
    color: white;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    z-index: 2;
    backdrop-filter: blur(4px);
    box-shadow: 0 4px 10px rgba(108,92,231,0.2);
    transition: all 0.3s ease;
}

.course-card:hover .course-category {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108,92,231,0.3);
}

.course-content {
    padding: 18px;
}

.course-title {
    font-size: 17px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 6px;
    color: #2d3436;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: auto;
    max-height: 48px;
}

.course-card:hover .course-title {
    color: #6c5ce7;
}

.course-description {
    color: #636e72;
    font-size: 13px;
    line-height: 1.5;
    margin: 10px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: auto;
    max-height: 40px;
}

.course-price {
    font-size: 18px;
    font-weight: 600;
    color: #6c5ce7;
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

.course-price::before {
    content: '₫';
    font-size: 13px;
    margin-right: 2px;
    font-weight: 500;
    position: absolute;
    left: -12px;
    top: 2px;
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
    background: rgba(108,92,231,0.08);
    padding: 3px 10px;
    border-radius: 15px;
}

.rating .rating-score {
    font-size: 13px;
    font-weight: 600;
    color: #6c5ce7;
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
    background: rgba(108,92,231,0.1);
    border-radius: 12px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.single_feature:hover .single_feature_icon {
    background: #6c5ce7;
    color: white;
    transform: scale(1.08);
}

/* Button Enhancement */
.btn_1 {
    padding: 10px 25px;
    border-radius: 25px;
    background: #6c5ce7;
    color: white;
    font-weight: 500;
    letter-spacing: 0.3px;
    border: 2px solid #6c5ce7;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
    overflow: hidden;
}

.btn_1:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(108,92,231,0.25);
    background: transparent;
    color: #6c5ce7;
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
    margin-bottom: 12px;
    position: relative;
    display: inline-block;
}

.section_tittle h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -8px;
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
    color: #6c5ce7;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 15px;
    animation: fadeInUp 0.6s ease;
}

.banner_text_iner h1 {
    font-size: 42px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
    animation: fadeInUp 0.8s ease;
}

.banner_text_iner p {
    font-size: 15px;
    line-height: 1.7;
    color: #636e72;
    margin-bottom: 25px;
    animation: fadeInUp 1s ease;
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
                            <img src="{{ Storage::url($course->thumbnail) }}" alt="{{ $course->title }}">
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



@endsection

