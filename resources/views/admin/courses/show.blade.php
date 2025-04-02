@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết khóa học</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Thông tin khóa học</h4>
                            <table class="table">
                                <tr>
                                    <th>Tiêu đề:</th>
                                    <td>{{ $course->title }}</td>
                                </tr>
                                <tr>
                                    <th>Mô tả:</th>
                                    <td>{!! $course->description !!}</td>
                                </tr>
                                <tr>
                                    <th>Giảng viên:</th>
                                    <td>{{ $course->instructor_name }}</td>
                                </tr>
                                <tr>
                                    <th>Thời lượng:</th>
                                    <td>{{ $course->duration }}</td>
                                </tr>
                                <tr>
                                    <th>Lịch học:</th>
                                    <td>{{ $course->schedule }}</td>
                                </tr>
                                <tr>
                                    <th>Giá:</th>
                                    <td>{{ number_format($course->getCurrentPrice(), 0, ',', '.') }} VNĐ</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h4>Thao tác</h4>
                            <div class="list-group">
                                <a href="{{ route('admin.courses.lessons.index', $course) }}" class="list-group-item list-group-item-action">
                                    <i class="fas fa-book"></i> Quản lý bài học
                                </a>
                                <a href="{{ route('admin.courses.edit', $course) }}" class="list-group-item list-group-item-action">
                                    <i class="fas fa-edit"></i> Chỉnh sửa khóa học
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="list-group-item list-group-item-action text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này?')">
                                        <i class="fas fa-trash"></i> Xóa khóa học
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
