@extends('layouts.admin')

@section('title', 'Danh sách khóa học')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách khóa học</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Thêm khóa học mới
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th style="width: 100px">Thumbnail</th>
                                    <th style="width: 120px">Mã khóa học</th>
                                    <th>Tên khóa học</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Danh mục</th>
                                    <th style="width: 120px">Trạng thái</th>
                                    <th style="width: 120px">Đăng ký</th>
                                    <th style="width: 150px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($course->thumbnail)
                                            <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}" class="img-thumbnail" style="max-height: 50px; width: auto;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $course->course_code }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ Str::limit($course->short_description, 100) }}</td>
                                    <td>
                                        @foreach($course->categories as $category)
                                            <span class="badge badge-info">{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm status-toggle {{ $course->is_published ? 'btn-success' : 'btn-danger' }}"
                                            data-course-id="{{ $course->id }}"
                                            data-status="{{ $course->is_published }}"
                                        >
                                            {{ $course->is_published ? 'Active' : 'Inactive' }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm registration-toggle {{ $course->allow_registration ? 'btn-success' : 'btn-danger' }}"
                                            data-course-id="{{ $course->id }}"
                                            data-status="{{ $course->allow_registration }}"
                                        >
                                            {{ $course->allow_registration ? 'Cho phép' : 'Không cho phép' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fas fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .status-toggle {
        min-width: 80px;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Xử lý chuyển đổi trạng thái
    $('.status-toggle').on('click', function() {
        const button = $(this);
        const courseId = button.data('course-id');

        // Disable button while processing
        button.prop('disabled', true);

        $.ajax({
            url: `/admin123/courses/${courseId}/toggle-status`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Cập nhật giao diện
                    if (response.is_published) {
                        button.removeClass('btn-danger').addClass('btn-success');
                        button.text('Active');
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger');
                        button.text('Inactive');
                    }

                    // Hiển thị thông báo thành công
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('Có lỗi xảy ra khi cập nhật trạng thái');
            },
            complete: function() {
                // Enable button after complete
                button.prop('disabled', false);
            }
        });
    });

    // Xử lý chuyển đổi trạng thái đăng ký
    $('.registration-toggle').on('click', function() {
        const button = $(this);
        const courseId = button.data('course-id');

        // Disable button while processing
        button.prop('disabled', true);

        $.ajax({
            url: `/admin123/courses/${courseId}/toggle-registration`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Cập nhật giao diện
                    if (response.allow_registration) {
                        button.removeClass('btn-danger').addClass('btn-success');
                        button.text('Cho phép');
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger');
                        button.text('Không cho phép');
                    }

                    // Hiển thị thông báo thành công
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('Có lỗi xảy ra khi cập nhật trạng thái đăng ký');
            },
            complete: function() {
                // Enable button after complete
                button.prop('disabled', false);
            }
        });
    });
});
</script>
@endpush
