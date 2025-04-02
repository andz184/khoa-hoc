@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Quản Lý Người Dùng</h3>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Thêm Người Dùng
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="users-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Vai Trò</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr data-user-id="{{ $user->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge badge-{{ optional($user->role)->name === 'admin' ? 'danger' : 'info' }}">
                                            {{ optional($user->role)->name ?? 'Chưa phân quyền' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm toggle-status {{ $user->status ? 'btn-success' : 'btn-danger' }}"
                                                data-user-id="{{ $user->id }}"
                                                data-status="{{ $user->status }}">
                                            {{ $user->status ? 'Kích hoạt' : 'Khóa' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm delete-user" data-user-id="{{ $user->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Không có dữ liệu</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if(method_exists($users, 'links'))
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .table-responsive {
        min-height: 200px;
    }

    .toggle-status {
        transition: all 0.3s ease;
        min-width: 80px;
    }

    .toggle-status:hover {
        transform: translateY(-2px);
    }

    .btn-group .btn {
        margin-right: 5px;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }

    tr {
        transition: all 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Xử lý toggle status
    $(document).on('click', '.toggle-status', function(e) {
        e.preventDefault();
        var button = $(this);
        var userId = button.data('user-id');

        $.ajax({
            url: '/admin123/users/' + userId + '/toggle-status',
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

    // Xử lý xóa user
    $(document).on('click', '.delete-user', function(e) {
        e.preventDefault();
        var button = $(this);
        var userId = button.data('user-id');

        if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
            $.ajax({
                url: '/admin123/users/' + userId,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        button.closest('tr').fadeOut(300, function() {
                            $(this).remove();
                            if ($('tbody tr').length === 0) {
                                $('tbody').append('<tr><td colspan="6" class="text-center">Không có dữ liệu</td></tr>');
                            }
                        });
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    var message = 'Có lỗi xảy ra khi xóa người dùng';
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr (nếu dùng) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- SweetAlert2 (nếu dùng) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FontAwesome (cho icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
