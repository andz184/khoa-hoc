@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bài học - {{ $course->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('admin.courses.lessons.create', $course) }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Thêm bài học mới
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="lessons-table">
                            <thead>
                                <tr>
                                    <th style="width: 50px">STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Link YouTube</th>
                                    <th>Link tải</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Hiển thị</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lessons as $lesson)
                                <tr data-id="{{ $lesson->id }}">
                                    <td class="handle" style="cursor: move;">
                                        <i class="fas fa-grip-vertical"></i>
                                    </td>
                                    <td>{{ $lesson->title }}</td>
                                    <td>
                                        <a href="{{ $lesson->youtube_link }}" target="_blank">
                                            <i class="fab fa-youtube text-danger"></i> Xem video
                                        </a>
                                    </td>
                                    <td>
                                        @if($lesson->download_link)
                                            <a href="{{ asset('storage/' . $lesson->download_link) }}"
                                               download="{{ $lesson->original_filename }}"
                                               target="_blank">
                                                <i class="fas fa-download text-primary"></i> Tải xuống
                                            </a>
                                        @else
                                            <span class="text-muted">Không có</span>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm sort-order-input"
                                               value="{{ $lesson->sort_order }}"
                                               min="0"
                                               data-lesson-id="{{ $lesson->id }}"
                                               style="width: 80px;">
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm toggle-publish"
                                                data-lesson-id="{{ $lesson->id }}"
                                                data-course-id="{{ $course->id }}"
                                                data-status="{{ $lesson->is_published }}">
                                            @if($lesson->is_published)
                                                <span class="badge badge-success">Đã xuất bản</span>
                                            @else
                                                <span class="badge badge-warning">Chưa xuất bản</span>
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm toggle-visibility"
                                                data-lesson-id="{{ $lesson->id }}"
                                                data-course-id="{{ $course->id }}"
                                                data-visibility="{{ $lesson->is_visible }}">
                                            @if($lesson->is_visible)
                                                <span class="badge badge-info">Hiển thị</span>
                                            @else
                                                <span class="badge badge-secondary">Ẩn</span>
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.courses.lessons.edit', [$course, $lesson]) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.courses.lessons.destroy', [$course, $lesson]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bài học này?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo Sortable cho bảng
    const tbody = document.querySelector('#lessons-table tbody');
    new Sortable(tbody, {
        handle: '.handle',
        animation: 150,
        onEnd: function(evt) {
            updateSortOrder();
        }
    });

    // Cập nhật thứ tự khi thay đổi input
    document.querySelectorAll('.sort-order-input').forEach(input => {
        input.addEventListener('change', function() {
            updateSortOrder();
        });
    });

    // Hàm cập nhật thứ tự
    function updateSortOrder() {
        const rows = tbody.querySelectorAll('tr');
        const orders = Array.from(rows).map((row, index) => {
            const input = row.querySelector('.sort-order-input');
            return {
                id: row.dataset.id,
                sort_order: parseInt(input.value) || index
            };
        });

        // Gửi request cập nhật thứ tự
        fetch('{{ route("admin.courses.lessons.update-order", $course) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ orders })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cập nhật lại các giá trị sort_order
                data.orders.forEach(order => {
                    const input = document.querySelector(`tr[data-id="${order.id}"] .sort-order-input`);
                    if (input) {
                        input.value = order.sort_order;
                    }
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>

<script>
$(document).ready(function() {
    // Toggle publish status
    $('.toggle-publish').click(function() {
        const button = $(this);
        const lessonId = button.data('lesson-id');
        const courseId = button.data('course-id');

        $.ajax({
            url: `{{ url('/admin123/courses') }}/${courseId}/lessons/${lessonId}/toggle-publish`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    const badge = button.find('.badge');
                    if (response.is_published) {
                        badge.removeClass('badge-warning').addClass('badge-success');
                        badge.text('Đã xuất bản');
                    } else {
                        badge.removeClass('badge-success').addClass('badge-warning');
                        badge.text('Chưa xuất bản');
                    }
                    toastr.success(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('Có lỗi xảy ra khi thay đổi trạng thái');
            }
        });
    });

    // Toggle visibility
    $('.toggle-visibility').click(function() {
        const button = $(this);
        const lessonId = button.data('lesson-id');
        const courseId = button.data('course-id');

        $.ajax({
            url: `{{ url('/admin123/courses') }}/${courseId}/lessons/${lessonId}/toggle-visibility`,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    const badge = button.find('.badge');
                    if (response.is_visible) {
                        badge.removeClass('badge-secondary').addClass('badge-info');
                        badge.text('Hiển thị');
                    } else {
                        badge.removeClass('badge-info').addClass('badge-secondary');
                        badge.text('Ẩn');
                    }
                    toastr.success(response.message);
                }
            },
            error: function(xhr) {
                toastr.error('Có lỗi xảy ra khi thay đổi trạng thái hiển thị');
            }
        });
    });
});
</script>
@endpush
@endsection
