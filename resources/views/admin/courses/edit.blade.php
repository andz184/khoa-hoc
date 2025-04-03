@extends('layouts.admin')

@section('title', 'Sửa khóa học')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sửa khóa học</h3>
                </div>

                <!-- Hiển thị tất cả các lỗi -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Hiển thị thông báo lỗi từ session -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Hiển thị thông báo thành công -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Tiêu đề khóa học <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="course_code">Mã khóa học <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" name="course_code" value="{{ old('course_code', $course->course_code) }}" required>
                                    @error('course_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="short_description">Mô tả ngắn</label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description', $course->short_description) }}</textarea>
                                    <small class="form-text text-muted">Mô tả ngắn sẽ được hiển thị ở trang chủ. Tối đa 255 ký tự.</small>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $course->slug) }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả khóa học</label>
                                    <div id="toolbar-container"></div>
                                    <div id="editor-container">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $course->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="categories">Danh mục <span class="text-danger">*</span></label>
                                    <select class="form-control select2 @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $course->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="regular_price">Giá gốc <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" value="{{ old('regular_price', $course->regular_price) }}" required>
                                            @error('regular_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Giá khuyến mãi</label>
                                            <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price', $course->sale_price) }}">
                                            @error('sale_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="thumbnail">Ảnh thumbnail</label>
                                    @if($course->thumbnail)
                                        <div class="mb-3">
                                            <img src="{{ env('APP_URL') . '/storage/app/public/' . $course->thumbnail }}" alt="Current thumbnail" class="img-thumbnail" style="max-height: 200px;">
                                        </div>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                                        <label class="custom-file-label" for="thumbnail">Chọn file mới</label>
                                    </div>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Kích thước tối đa: 2MB. Định dạng: JPG, PNG, GIF</small>
                                </div>

                                <div class="form-group">
                                    <label for="instructor_name">Tên giảng viên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('instructor_name') is-invalid @enderror" id="instructor_name" name="instructor_name" value="{{ old('instructor_name', $course->instructor_name) }}" required>
                                    @error('instructor_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="is_published">Trạng thái</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" {{ old('is_published', $course->is_published) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_published">Xuất bản</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập nhật khóa học</button>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-default">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    #editor-container {
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .ck-editor__editable {
        min-height: 300px !important;
        max-height: 600px;
        padding: 1rem !important;
    }

    .ck.ck-editor__main > .ck-editor__editable {
        background: #fff;
    }

    .ck.ck-toolbar {
        background: #f8f9fa !important;
        border: none !important;
        border-bottom: 1px solid #ddd !important;
    }

    .ck.ck-toolbar .ck-toolbar__items {
        flex-wrap: wrap;
    }

    .ck.ck-toolbar .ck-toolbar__items > * {
        margin: 4px;
    }

    .ck.ck-button {
        padding: 6px 10px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    // Tự động tạo slug từ title
    document.getElementById('title').addEventListener('input', function() {
        if (!document.getElementById('slug').value) {
            document.getElementById('slug').value = createSlug(this.value);
        }
    });

    // Hiển thị tên file đã chọn
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    // Khởi tạo Select2
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: 'Chọn danh mục'
        });

        // Khởi tạo CKEditor
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold', 'italic', 'strikethrough', 'underline',
                        '|',
                        'bulletedList', 'numberedList',
                        '|',
                        'alignment',
                        '|',
                        'uploadImage', 'link', 'blockQuote', 'insertTable',
                        '|',
                        'undo', 'redo'
                    ]
                },
                image: {
                    toolbar: [
                        'imageStyle:inline',
                        'imageStyle:wrapText',
                        'imageStyle:breakText',
                        '|',
                        'toggleImageCaption',
                        'imageTextAlternative'
                    ],
                    styles: [
                        'full',
                        'side',
                        'alignLeft',
                        'alignCenter',
                        'alignRight'
                    ],
                    type: ['jpeg', 'png', 'gif', 'bmp', 'webp', 'tiff', 'jpg']
                },
                simpleUpload: {
                    uploadUrl: '{{ route("admin.upload.image") }}',
                    withCredentials: true,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            })
            .then(editor => {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file.then(file => {
                                return new Promise((resolve, reject) => {
                                    const formData = new FormData();
                                    formData.append('upload', file);

                                    fetch('{{ route("admin.upload.image") }}', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(response => {
                                        if (response.url) {
                                            resolve({
                                                default: response.url
                                            });
                                        } else {
                                            reject(response.error?.message || 'Upload failed');
                                        }
                                    })
                                    .catch(error => {
                                        reject('Upload failed');
                                    });
                                });
                            });
                        },
                        abort: function() {
                            console.log('Upload aborted');
                        }
                    };
                };
            })
            .catch(error => {
                console.error('Editor error:', error);
            });
    });

    // Xử lý tạo slug tự động
    function createSlug(str) {
        str = str.toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd')
            .replace(/Đ/g, 'D')
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '')
            .toLowerCase();
        return str;
    }

    let titleElement = document.getElementById('title');
    let slugElement = document.getElementById('slug');
    let isSlugEdited = false;

    titleElement.addEventListener('input', function() {
        if (!isSlugEdited) {
            slugElement.value = createSlug(this.value);
        }
    });

    slugElement.addEventListener('input', function() {
        isSlugEdited = true;
    });

    slugElement.addEventListener('change', function() {
        if (this.value === '') {
            isSlugEdited = false;
        }
    });

    // Xử lý giá khuyến mãi
    document.getElementById('sale_price').addEventListener('input', function() {
        const regularPrice = parseFloat(document.getElementById('regular_price').value) || 0;
        const salePrice = parseFloat(this.value) || 0;

        if (salePrice >= regularPrice) {
            this.setCustomValidity('Giá khuyến mãi phải nhỏ hơn giá gốc');
        } else {
            this.setCustomValidity('');
        }
    });

    document.getElementById('regular_price').addEventListener('input', function() {
        const saleInput = document.getElementById('sale_price');
        if (saleInput.value) {
            const regularPrice = parseFloat(this.value) || 0;
            const salePrice = parseFloat(saleInput.value) || 0;

            if (salePrice >= regularPrice) {
                saleInput.setCustomValidity('Giá khuyến mãi phải nhỏ hơn giá gốc');
            } else {
                saleInput.setCustomValidity('');
            }
        }
    });
</script>
@endpush
