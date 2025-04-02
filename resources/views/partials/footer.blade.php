<!-- Footer Section Start -->
<style>
    .footer_part {
        background-color: #3f51b5;
        padding: 60px 0 20px;
        color: #fff;
        position: relative;
    }

    .footer_part .footer_logo {
        margin-bottom: 20px;
    }

    .footer_part .footer_logo img {
        max-width: 180px;
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
        background: #ff4081;
    }

    .single-footer-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .single-footer-widget ul li {
        margin-bottom: 8px;
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
        color: #ff4081;
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
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        transition: all 0.3s ease;
    }

    .single-footer-widget .social-links a:hover {
        background: #ff4081;
        transform: translateY(-3px);
    }

    .newsletter_form {
        position: relative;
        margin-top: 15px;
    }

    .newsletter_form input {
        width: 100%;
        height: 45px;
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.1);
        border: none;
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
        background: #ff4081;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 0 15px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .newsletter_form button:hover {
        background: #f50057;
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
        color: #ff4081;
    }
</style>

<footer class="footer_part">
    <div class="container">
        <div class="row footer_top justify-content-between">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="single-footer-widget">
                    <div class="footer_logo">
                        <h2 style="color: #fff; font-weight: 700;">KhoaHocAI.Pro</h2>
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
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="single-footer-widget">
                    <h4>Liên hệ</h4>
                    <ul class="footer-contact-info">
                        <li><a href="#"><i class="fas fa-phone-alt"></i> 0384265999</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> khoahocai.pro</a></li>
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
