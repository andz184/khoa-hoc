@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh Sửa Danh Mục</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên Danh Mục</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name', $category->name) }}" required
                                   placeholder="Ví dụ: Lê Văn An">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Nhập tên danh mục, slug sẽ tự động được tạo
                            </small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="slug">Slug</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-link"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                       id="slug" name="slug" value="{{ old('slug', $category->slug) }}"
                                       readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="editSlug">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Slug sẽ được tạo tự động. Bấm vào icon bút chì để chỉnh sửa thủ công.
                            </small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Mô Tả</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="status">Trạng Thái</label>
                            <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status">
                                <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Hiển Thị</option>
                                <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Ẩn</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i> Cập Nhật
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i> Quay Lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    border: none;
    border-radius: 10px;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
    padding: 20px;
}

.card-title {
    margin: 0;
    color: #333;
    font-weight: 600;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.input-group-text {
    background-color: #f8f9fa;
    border-color: #ddd;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    transform: translateY(-1px);
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    margin-left: 10px;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
    transform: translateY(-1px);
}

.btn-outline-secondary:hover {
    background-color: #f8f9fa;
    color: #333;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 5px;
}

#slug[readonly] {
    background-color: #fff;
    cursor: default;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const editSlugBtn = document.getElementById('editSlug');
    let isSlugEditable = false;

    // Function to convert string to slug
    function stringToSlug(str) {
        // Remove accents
        str = str.normalize('NFD')
                 .replace(/[\u0300-\u036f]/g, '');

        return str
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    // Real-time slug generation
    nameInput.addEventListener('input', function(e) {
        if (!isSlugEditable) {
            slugInput.value = stringToSlug(this.value);
        }
    });

    // Toggle slug editability
    editSlugBtn.addEventListener('click', function() {
        isSlugEditable = !isSlugEditable;
        slugInput.readOnly = !isSlugEditable;

        if (isSlugEditable) {
            slugInput.focus();
            this.innerHTML = '<i class="fas fa-check"></i>';
            this.classList.remove('btn-outline-secondary');
            this.classList.add('btn-outline-success');
        } else {
            this.innerHTML = '<i class="fas fa-edit"></i>';
            this.classList.remove('btn-outline-success');
            this.classList.add('btn-outline-secondary');
        }
    });

    // Clean up slug when manually editing
    slugInput.addEventListener('input', function() {
        if (isSlugEditable) {
            this.value = stringToSlug(this.value);
        }
    });

    // Example of real-time preview
    nameInput.addEventListener('input', function() {
        if (this.value === '') {
            slugInput.value = '';
        }
    });
});
</script>
@endsection
