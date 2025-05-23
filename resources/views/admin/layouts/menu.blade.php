<li class="side-nav-item">
    <a href="{{ route('dashboard') }}" class="side-nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <span> Dashboard </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="{{ route('admin.categories.index') }}" class="side-nav-link">
        <i class="fas fa-list"></i>
        <span> Quản lý danh mục </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="{{ route('admin.courses.index') }}" class="side-nav-link">
        <i class="fas fa-graduation-cap"></i>
        <span> Quản lý khóa học </span>
    </a>
    <ul class="side-nav-second-level">
        <li>
            <a href="{{ route('admin.courses.index') }}">Danh sách khóa học</a>
        </li>
        <li>
            <a href="{{ route('admin.courses.create') }}">Thêm khóa học mới</a>
        </li>
    </ul>
</li>

<li class="side-nav-item">
    <a href="{{ route('admin.users.index') }}" class="side-nav-link">
        <i class="fas fa-users"></i>
        <span> Quản lý người dùng </span>
    </a>
</li>
