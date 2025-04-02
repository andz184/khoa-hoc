@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Quản Lý Danh Mục</h3>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm Danh Mục
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm toggle-status {{ $category->status ? 'btn-success' : 'btn-danger' }}"
                                                data-category-id="{{ $category->id }}"
                                                data-status="{{ $category->status }}">
                                            {{ $category->status ? 'Kích hoạt' : 'Khóa' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm delete-category" data-category-id="{{ $category->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Không có dữ liệu</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Xử lý toggle status
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        var button = $(this);
        var categoryId = button.data('category-id');

        $.ajax({
            url: '/admin123/categories/' + categoryId + '/toggle-status',
            type: 'POST',
            success: function(response) {
                if (response.success) {
                    // Cập nhật trạng thái button
                    if (response.status) {
                        button.removeClass('btn-danger').addClass('btn-success');
                        button.text('Kích hoạt');
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger');
                        button.text('Khóa');
                    }
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                var message = 'Có lỗi xảy ra khi cập nhật trạng thái';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                toastr.error(message);
            }
        });
    });

    // Xử lý xóa category
    $(document).on('click', '.delete-category', function(e) {
        e.preventDefault();
        var button = $(this);
        var categoryId = button.data('category-id');

        if (confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
            $.ajax({
                url: '/admin123/categories/' + categoryId,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        button.closest('tr').fadeOut(300, function() {
                            $(this).remove();
                            if ($('tbody tr').length === 0) {
                                $('tbody').append('<tr><td colspan="4" class="text-center">Không có dữ liệu</td></tr>');
                            }
                        });
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    var message = 'Có lỗi xảy ra khi xóa danh mục';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                    toastr.error(message);
                }
            });
        }
    });
});
</script>
@endpush
@endsection
