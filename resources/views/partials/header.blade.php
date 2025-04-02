<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/khoahocaipro.png') }}" alt="logo" style="width: 300px; height: 100px;">
                    </a>
                    <button class="navbar-toggler" type="button" id="mobile-menu-toggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('course') }}">Danh sách khóa học</a>
                            </li>

                            <li class="d-none d-lg-block">
                                @auth
                                    @if (Auth::user()->role_id == '2')
                                        <a class="btn_1" href="{{ route('home-learn') }}">Vào phần học bài</a>
                                    @elseif (Auth::user()->role_id == '1')
                                        <a class="btn_1" href="{{ route('dashboard') }}">Vào dashboard</a>
                                    @else
                                        <a class="btn_1" href="{{ route('dashboard') }}">Đăng nhập</a>
                                    @endif
                                @else
                                    <a class="btn_1" href="{{ route('login') }}">Đăng nhập</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<style>
@media (max-width: 991px) {
    .navbar-collapse {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        position: absolute;
        top: 100%;
        left: 15px;
        right: 15px;
        z-index: 1000;
        display: none;
        margin-top: 10px;
        animation: slideDown 0.3s ease-in-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .navbar-collapse.show {
        display: block;
    }

    .navbar-nav {
        width: 100%;
    }

    .nav-item {
        margin: 0;
        transition: all 0.3s ease;
    }

    .nav-item:hover {
        background: #f8f9fa;
    }

    .nav-link {
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
        color: #333;
        font-weight: 500;
        display: block;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #007bff;
        padding-left: 25px;
    }

    .nav-item.active .nav-link {
        color: #007bff;
        background: #f8f9fa;
    }

    .btn_1 {
        width: 100%;
        text-align: center;
        margin-top: 15px;
        padding: 12px 20px;
        border-radius: 5px;
        background: #007bff;
        color: white;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn_1:hover {
        background: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,123,255,0.3);
    }

    #mobile-menu-toggle {
        border: none;
        padding: 10px;
        outline: none !important;
        background: transparent;
        transition: all 0.3s ease;
    }

    #mobile-menu-toggle:focus {
        outline: none !important;
    }

    #mobile-menu-toggle:hover {
        background: #f8f9fa;
        border-radius: 5px;
    }

    .navbar-toggler-icon {
        width: 25px;
        height: 25px;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(0, 0, 0, 0.75)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const navbarCollapse = document.getElementById('navbarSupportedContent');
    let isMenuOpen = false;

    mobileMenuToggle.addEventListener('click', function() {
        isMenuOpen = !isMenuOpen;
        if (isMenuOpen) {
            navbarCollapse.classList.add('show');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
        } else {
            navbarCollapse.classList.remove('show');
            document.body.style.overflow = ''; // Restore scrolling
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!navbarCollapse.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
            navbarCollapse.classList.remove('show');
            isMenuOpen = false;
            document.body.style.overflow = '';
        }
    });

    // Close menu when clicking on a link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navbarCollapse.classList.remove('show');
            isMenuOpen = false;
            document.body.style.overflow = '';
        });
    });
});
</script>
