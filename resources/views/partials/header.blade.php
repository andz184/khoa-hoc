<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <div class="text-logo">
                            <span class="logo-text">KhoaHocAI<span class="logo-dot">.</span>Pro</span>
                        </div>
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
/* Modern Header Styling for Dark Theme */
.main_menu {
    background-color: #14082e;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%232a1b55' fill-opacity='0.3' fill-rule='evenodd'/%3E%3C/svg%3E");
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    padding: 15px 0;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar-light .navbar-nav .nav-link {
    color: #ffffff !important;
    font-weight: 500;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    padding: 10px 18px;
    transition: all 0.3s ease;
}

.navbar-light .navbar-nav .active > .nav-link,
.navbar-light .navbar-nav .nav-link:hover {
    color: #cb9dff !important;
}

.btn_1 {
    background-color: #b76dd4;
    border: 2px solid #b76dd4;
    color: white;
    font-weight: 600;
    padding: 10px 22px;
    border-radius: 30px;
    box-shadow: 0 10px 20px rgba(183, 109, 212, 0.3);
    transition: all 0.3s ease;
}

.btn_1:hover {
    background-color: transparent;
    color: #b76dd4;
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(183, 109, 212, 0.2);
}

#mobile-menu-toggle {
    background: transparent;
    border: none;
}

#mobile-menu-toggle .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.85)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* Text-based logo styling */
.text-logo {
    display: flex;
    align-items: center;
}

.logo-text {
    font-size: 28px;
    font-weight: 800;
    background: linear-gradient(to right, #ffffff, #e0a2ff, #ffcd4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 10px rgba(255, 255, 255, 0.3);
}

.logo-dot {
    color: #b76dd4;
    -webkit-text-fill-color: #b76dd4;
    font-size: 32px;
    font-weight: 900;
}

@media (max-width: 991px) {
    .navbar-collapse {
        background: #14082e;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        position: absolute;
        top: 100%;
        left: 15px;
        right: 15px;
        z-index: 1000;
        display: none;
        margin-top: 10px;
        animation: slideDown 0.3s ease-in-out;
        border: 1px solid rgba(255, 255, 255, 0.05);
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
        background: rgba(255, 255, 255, 0.05);
    }

    .nav-link {
        padding: 15px 20px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        color: #ffffff !important;
        font-weight: 500;
        display: block;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #cb9dff !important;
        padding-left: 25px !important;
    }

    .nav-item.active .nav-link {
        color: #cb9dff !important;
        background: rgba(203, 157, 255, 0.1);
    }

    .btn_1 {
        width: 100%;
        text-align: center;
        margin-top: 15px;
        padding: 12px 20px;
        background: #b76dd4;
        color: white !important;
    }

    .btn_1:hover {
        background: rgba(183, 109, 212, 0.8);
        color: white !important;
    }

    .logo-text {
        font-size: 24px;
    }

    .logo-dot {
        font-size: 28px;
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
