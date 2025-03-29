<div class="side-bar">

    <div id="close-btn">
       <i class="fas fa-times"></i>
    </div>

    <div class="profile">
        <img src="{{ asset('assets/img/pic-1.jpg') }}" alt="">
       <h3 class="name">shaikh anas</h3>
       <p class="role">studen</p>
       <a href="profile.html" class="btn">view profile</a>
    </div>

    <nav class="navbar">
       <a href="home.html"><i class="fas fa-home"></i><span>home</span></a>

       <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>courses</span></a>

       <form action="{{route('logout')}}" method="POST" style="display: inline;">
        @csrf <!-- Nếu bạn dùng Laravel, cần thêm token CSRF -->
        <button type="submit" class="btn btn-link text-decoration-none p-0">
           <span>Đăng xuất</span>
        </button>
    </form>
    </nav>

 </div>
