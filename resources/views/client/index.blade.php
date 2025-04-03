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
    background: #9b59b6 !important;
    border: 2px solid #9b59b6 !important;
    transition: all 0.3s ease;
}

.btn_1:hover {
    background: transparent !important;
    color: #9b59b6 !important;
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
</style>
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>Biến đam mê công nghệ thành kỹ năng thực tiễn</h5>
                        <h1>Xây dựng AI tự động hoá <span class="highlight">từ Cơ bản đến Nâng cao</span></h1>
                        <p>Trong khóa học này, anh/chị không chỉ được học về cách <span class="text-emphasis">ứng dụng AI vào thực tế</span>, mà còn học về
                            <span class="text-emphasis">tự động hoá</span> và kết nối 2 công nghệ mạnh mẽ nhất với nhau để xây dựng các <span class="text-emphasis">Hệ thống AI
                            Automation</span> <span class="text-highlight">VƯỢT XA SỨC TƯỞNG TƯỢNG</span> của nhiều người.</p>
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
                <div class="feature_text_area">
                    <div class="section_tittle">
                        <h2>Tại sao chọn<br> <span class="text_highlight">KhoaHocAI.Pro?</span></h2>
                    </div>
                    <p>Khoá học được xây dựng bởi các chuyên gia có cả năng lực về ứng dụng và xây dựng các sản phẩm AI.</p>
                    <a href="{{ route('course') }}" class="feature_btn">Xem Tất Cả Khóa Học</a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-layers"></i>
                        </div>
                    </div>
                    <h3 class="feature_title">Nội dung cập nhật mới nhất</h3>
                    <p class="feature_description">Học cách ứng dụng công nghệ AI và xây dựng các AI Agent từ con số 0.</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-new-window"></i>
                        </div>
                    </div>
                    <h3 class="feature_title">Phù hợp cho người mới</h3>
                    <p class="feature_description">Phù hợp cho người mới bắt đầu lẫn chuyên gia muốn nâng cao kỹ năng.</p>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="feature_card">
                    <div class="feature_icon_wrapper">
                        <div class="feature_icon">
                            <i class="ti-light-bulb"></i>
                        </div>
                    </div>
                    <h3 class="feature_title">Đội ngũ giảng viên luôn sẵn sàng</h3>
                    <p class="feature_description">Đội ngũ giảng viên luôn sẵn sàng giải đáp thắc mắc và hỗ trợ kể cả trong thời gian học và sau khi hoàn thành khóa học.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.feature_part {
    background-color: #1a103c;
    padding: 80px 0;
    position: relative;
    overflow: hidden;
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
}

.feature_text_area .text_highlight {
    color: #b76dd4;
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
}

.feature_text_area h2::after {
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

.feature_text_area:hover h2::after {
    width: 100%;
}

.feature_text_area p {
    font-size: 16px;
    line-height: 1.7;
    color: #d8d5ed;
    margin-bottom: 25px;
}

.feature_btn {
    display: inline-block;
    background: rgba(43, 30, 76, 0.8);
    border: 2px solid #b76dd4;
    color: #ffffff;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 30px;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 0 10px rgba(183, 109, 212, 0.5);
}

.feature_btn:hover {
    background-color: rgba(70, 50, 120, 0.8);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 0 15px rgba(183, 109, 212, 0.7);
}

.feature_card {
    background-color: #ffffff;
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
    height: 100%;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.feature_card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.feature_icon_wrapper {
    margin-bottom: 20px;
}

.feature_icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #f1eeff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #b76dd4;
    margin-bottom: 5px;
}

.feature_title {
    font-size: 18px;
    font-weight: 600;
    color: #1a103c;
    margin-bottom: 15px;
}

.feature_description {
    font-size: 14px;
    line-height: 1.6;
    color: #636e72;
    margin-bottom: 0;
    flex-grow: 1;
}

@media (max-width: 991px) {
    .feature_part {
        padding: 60px 0;
    }

    .feature_text_area {
        text-align: center;
        padding-right: 0;
        margin-bottom: 40px;
    }

    .feature_btn {
        margin: 0 auto;
        display: block;
        max-width: 220px;
    }
}
</style>
<!-- feature_part end-->

<!-- upcoming_event part start-->

<!-- learning part start-->
<section class="about_section">
    <div class="about_container">
        <div class="about_card">
            <div class="about_illustration">
                <div class="editor_illustration">
                    <div class="page_outline"></div>
                    <div class="dash_border"></div>
                    <div class="editor_window">
                        <div class="list_item">
                            <div class="check_icon"><i class="ti-check"></i></div>
                            <div class="line"></div>
                        </div>
                        <div class="list_item">
                            <div class="check_icon"><i class="ti-check"></i></div>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="chat_bubble"><i class="ti-comment"></i></div>
                    <div class="green_checkmark"><i class="ti-check"></i></div>
                    <div class="circle_element"></div>
                    <div class="dotted_line horizontal"></div>
                    <div class="dotted_line vertical"></div>
                </div>
            </div>
            <div class="about_content">
                <div class="section_tittle">
                    <h2><span class="text_highlight">Nơi Kiến Tạo Tương Lai</span> Cùng <span class="text_highlight">Trí Tuệ Nhân Tạo</span></h2>
                </div>

                <p class="about_description">Tại KhoaHocAI.Pro, chúng tôi tự hào mang đến các khóa học AI được xây dựng bởi đội ngũ chuyên gia hàng đầu, những người không chỉ sở hữu năng lực vượt trội trong việc ứng dụng AI.</p>

                <p class="about_description">Chúng tôi cam kết cung cấp nội dung cập nhật mới nhất, giúp bạn nắm bắt cách ứng dụng công nghệ AI tiên tiến và tự tay xây dựng các AI Agent từ con số 0.</p>

                <a href="{{ route('course') }}" class="contact_button">Xem tất cả khóa học</a>
            </div>
        </div>
    </div>
</section>

<style>
/* Modern About Section with Card Layout */
.about_section {
    background-color: #1a103c;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236a4c93' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    padding: 80px 0;
    position: relative;
    overflow: hidden;
}

.about_section::before {
    content: '';
    position: absolute;
    width: 800px;
    height: 800px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(155, 89, 182, 0.1) 0%, rgba(26, 16, 60, 0) 70%);
    top: -400px;
    right: -400px;
    z-index: 0;
}

.about_section::after {
    content: '';
    position: absolute;
    width: 600px;
    height: 600px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(155, 89, 182, 0.1) 0%, rgba(26, 16, 60, 0) 70%);
    bottom: -300px;
    left: -300px;
    z-index: 0;
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

.editor_illustration {
    width: 100%;
    height: 100%;
    position: relative;
}

.page_outline {
    position: absolute;
    width: 80%;
    height: 80%;
    border: 2px dashed #9b59b6;
    border-radius: 15px;
    opacity: 0.3;
    left: 0;
    top: 10%;
}

.dash_border {
    position: absolute;
    width: 90%;
    height: 90%;
    border: 2px dashed #9b59b6;
    border-radius: 15px;
    opacity: 0.1;
    right: 0;
    bottom: 0;
}

.editor_window {
    position: absolute;
    width: 70%;
    height: 60%;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    top: 20%;
    left: 15%;
    overflow: hidden;
    padding: 20px;
}

.list_item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.check_icon {
    width: 24px;
    height: 24px;
    background-color: #b76dd4;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    margin-right: 10px;
}

.line {
    height: 10px;
    background-color: #e0e0ff;
    flex-grow: 1;
    border-radius: 5px;
}

.chat_bubble {
    position: absolute;
    width: 36px;
    height: 36px;
    background-color: #b76dd4;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    bottom: 20%;
    left: 10%;
    box-shadow: 0 5px 15px rgba(183, 109, 212, 0.4);
}

.green_checkmark {
    position: absolute;
    width: 36px;
    height: 36px;
    background-color: #8bc34a;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    top: 15%;
    right: 10%;
    box-shadow: 0 5px 15px rgba(139, 195, 74, 0.3);
}

.circle_element {
    position: absolute;
    width: 40px;
    height: 40px;
    border: 2px solid #b76dd4;
    border-radius: 50%;
    opacity: 0.7;
    bottom: 30%;
    right: 20%;
}

.dotted_line {
    position: absolute;
    background-image: linear-gradient(to right, #b76dd4 50%, rgba(255, 255, 255, 0) 0%);
    background-position: top;
    background-size: 8px 2px;
    background-repeat: repeat-x;
    opacity: 0.4;
}

.dotted_line.horizontal {
    width: 100px;
    height: 2px;
    top: 50%;
    right: 5%;
}

.dotted_line.vertical {
    width: 2px;
    height: 100px;
    background-image: linear-gradient(to bottom, #b76dd4 50%, rgba(255, 255, 255, 0) 0%);
    background-position: center;
    background-size: 2px 8px;
    right: 25%;
    top: 30%;
    opacity: 0.6;
}

.about_content {
    flex: 0 0 50%;
    padding: 60px 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.about_title {
    font-size: 32px;
    font-weight: 700;
    color: #2d3436;
    margin-bottom: 25px;
    line-height: 1.3;
}

.text_highlight {
    background: linear-gradient(to right, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
}

.about_description {
    font-size: 16px;
    line-height: 1.7;
    color: #636e72;
    margin-bottom: 20px;
}

.contact_button {
    display: inline-block;
    background: rgba(43, 30, 76, 0.8);
    border: 2px solid #b76dd4;
    color: #ffffff;
    font-weight: 600;
    padding: 12px 28px;
    border-radius: 30px;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 0 10px rgba(183, 109, 212, 0.5);
    margin-top: 20px;
}

.contact_button:hover {
    background-color: rgba(70, 50, 120, 0.8);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 0 15px rgba(183, 109, 212, 0.7);
    text-decoration: none;
}

@media (max-width: 991px) {
    .about_section {
        padding: 60px 15px;
    }

    .about_card {
        flex-direction: column;
    }

    .about_illustration, .about_content {
        flex: 0 0 100%;
    }

    .about_illustration {
        height: 300px;
        order: 1;
    }

    .about_content {
        padding: 40px 30px;
        order: 2;
    }

    .about_title {
        font-size: 28px;
    }
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
    padding: 18px;
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

