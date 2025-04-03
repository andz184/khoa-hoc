<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', config('app.name', 'Khoá Học AI'))</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.jpg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <style>
        /* Theme Reset for Dark Background */
        body {
            background-color: #1a103c;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%236a4c93' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            color: #ffffff;
        }

        .section {
            background: transparent;
        }

        .feature_part, .pricing_part, .our_service, .member_counter, .about_part, .blog_part {
            background-color: transparent !important;
        }

        .single_feature:hover, .pricing_part .single_pricing_part, .client_review, .blog_item {
            background-color: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        h1, h2, h3, h4, h5, h6 {
            color: #ffffff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        p {
            color: #d8d5ed;
            font-weight: 400;
        }

        .footer_part {
            background-color: rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Header and Navigation Styles */
        .main_menu {
            background-color: rgba(15, 8, 36, 0.9);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .main_menu .navbar-brand img {
            max-height: 50px;
            filter: brightness(1.3) contrast(1.1);
        }

        .navbar-light .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .navbar-light .navbar-nav .active > .nav-link,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #cb9dff !important;
        }

        .btn_1 {
            background-color: #b76dd4;
            border: none;
            color: white;
            box-shadow: 0 10px 20px rgba(183, 109, 212, 0.4);
            font-weight: 600;
        }

        .btn_1:hover {
            background-color: #c686e0 !important;
            color: white !important;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(183, 109, 212, 0.5);
        }

        /* Card Styles to Match Design */
        .section_title h2 {
            color: white;
            font-weight: 700;
        }

        .section_title p {
            color: #cb9dff;
            font-weight: 600;
        }

        .card {
            background-color: #f8f9fe;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 35px 60px rgba(0, 0, 0, 0.25);
        }

        .card-title {
            color: #1a103c;
            font-weight: 700;
        }

        .card-text {
            color: #333;
        }

        .course_card {
            background-color: #f8f9fe;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .course_card:hover {
            transform: translateY(-10px);
            box-shadow: 0 35px 60px rgba(0, 0, 0, 0.25);
        }

        /* Additional styles for better contrast */
        .banner_part {
            background-image: linear-gradient(rgba(15, 8, 36, 0.8), rgba(15, 8, 36, 0.8)), url('../img/banner_bg.png');
        }

        .single_special_cource {
            background-color: #f8f9fe;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Additional contrast improvements */
        a {
            color: #cb9dff;
            font-weight: 500;
        }

        a:hover {
            color: #dfbcff;
        }

        .section_tittle h2 {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .section_tittle p {
            color: #b388ff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .single_feature {
            background-color: rgba(255, 255, 255, 0.07);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .single_feature_part h4 {
            color: #ffffff;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .single_feature_part p {
            color: #d8d5ed;
        }

        .single_feature_icon {
            background-color: rgba(183, 109, 212, 0.2) !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color: #cb9dff;
        }
    </style>
</head>

<body >


    <!-- Navbar -->
    @include('partials.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    @yield('content')

    @include('partials.footer')
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Slug convert function -->
    <script type="text/javascript">
        function ChangeToSlug() {
            var slug;
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            slug = slug.replace(/ /gi, "-");
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            document.getElementById('convert_slug').value = slug;
        }
    </script>

    <!-- Custom JavaScript for mobile menu -->
    <script>
        $(document).ready(function() {
            // Handle navbar toggler click
            $('.navbar-toggler').click(function() {
                // Add smooth animation to menu collapse
                $('.navbar-collapse').slideToggle(300);

                // Toggle aria-expanded attribute
                var isExpanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !isExpanded);

                // Add animation class to icon
                $(this).find('.navbar-toggler-icon').toggleClass('active');
            });

            // Close menu when clicking outside
            $(document).click(function(event) {
                var clickover = $(event.target);
                var _opened = $('.navbar-collapse').hasClass('show');
                if (_opened === true && !clickover.hasClass('navbar-toggler')) {
                    $('.navbar-toggler').attr('aria-expanded', 'false');
                    $('.navbar-collapse').slideUp(300);
                }
            });

            // Close menu when clicking a nav-link
            $('.nav-link').click(function() {
                $('.navbar-collapse').slideUp(300);
                $('.navbar-toggler').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>
