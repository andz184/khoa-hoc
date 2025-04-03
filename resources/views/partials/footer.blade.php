<!-- Footer Section Start -->
<style>
    .footer_part {
        background-color: #14082e;
        padding: 60px 0 20px;
        color: #fff;
        position: relative;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%232a1b55' fill-opacity='0.3' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .footer_part::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(to right, rgba(183, 109, 212, 0), rgba(183, 109, 212, 0.5), rgba(183, 109, 212, 0));
    }

    .footer_part .footer_logo {
        margin-bottom: 20px;
    }

    .footer_part .footer_logo h2 {
        background: linear-gradient(to right, #e0a2ff, #dfbcff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        font-weight: 700;
    }

    .footer_top {
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .single-footer-widget h4 {
        color: #fff;
        font-size: 18px;
        margin-bottom: 20px;
        font-weight: 600;
        position: relative;
    }

    .single-footer-widget h4:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -8px;
        height: 2px;
        width: 40px;
        background: #b76dd4;
    }

    .single-footer-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .single-footer-widget ul li {
        margin-bottom: 10px;
    }

    .single-footer-widget ul li a {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        font-weight: 400;
        transition: all 0.3s ease;
        display: block;
        line-height: 1.6;
    }

    .single-footer-widget ul li a:hover {
        color: #b76dd4;
        padding-left: 5px;
        text-decoration: none;
    }

    .single-footer-widget .social-links {
        display: flex;
        gap: 12px;
        margin-top: 20px;
    }

    .single-footer-widget .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
        transition: all 0.3s ease;
    }

    .single-footer-widget .social-links a:hover {
        background: #b76dd4;
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(183, 109, 212, 0.3);
    }

    .newsletter_form {
        position: relative;
        margin-top: 15px;
    }

    .newsletter_form input {
        width: 100%;
        height: 45px;
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        color: #fff;
        outline: none;
    }

    .newsletter_form input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .newsletter_form button {
        position: absolute;
        right: 5px;
        top: 5px;
        height: 35px;
        background: #b76dd4;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 0 15px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .newsletter_form button:hover {
        background: #c686e0;
    }

    .footer_bottom {
        padding-top: 20px;
    }

    .footer_bottom p {
        margin-bottom: 0;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
        text-align: center;
    }

    .footer-info p {
        line-height: 1.6;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 15px;
    }

    .footer-contact-info i {
        margin-right: 8px;
        color: #b76dd4;
    }
</style>

<footer class="footer_part">
    <div class="container">
        <div class="row footer_top justify-content-between">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="single-footer-widget">
                    <div class="footer_logo">
                        <h2>KhoaHocAI.Pro</h2>
                    </div>
                    <div class="footer-info">
                        <p>Nơi Kiến Tạo Tương Lai Cùng Trí Tuệ Nhân Tạo. Chúng tôi cung cấp các khóa học chất lượng cao về AI và tự động hóa.</p>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 mb-4">
                <div class="single-footer-widget">
                    <h4>Khóa học</h4>
                    <ul>
                        <li><a href="#">AI Cơ bản</a></li>
                        <li><a href="#">Tự động hóa với AI</a></li>
                        <li><a href="#">Xây dựng AI Agent</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="single-footer-widget">
                    <h4>Liên hệ</h4>
                    <ul class="footer-contact-info">
                        <li><a href="#"><i class="fas fa-phone-alt"></i> 0384265999</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> info@khoahocai.pro</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Hà Nội, Việt Nam</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row footer_bottom">
            <div class="col-lg-12">
                <p>© 2023 KhoaHocAI.Pro. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </div>
</footer>

<!-- JS here -->
<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Date Picker -->
<script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
<!-- Nice-select, sticky -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<!-- Progress -->
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
