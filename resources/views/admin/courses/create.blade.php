@extends('layouts.admin')

@section('title', 'Thêm khóa học mới')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thêm khóa học mới</h3>
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

                <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Tiêu đề khóa học <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="course_code">Mã khóa học <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" name="course_code" value="{{ old('course_code') }}" required>
                                    @error('course_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="short_description">Mô tả ngắn</label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                    <small class="form-text text-muted">Mô tả ngắn sẽ được hiển thị ở trang chủ. Tối đa 255 ký tự.</small>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả khóa học</label>
                                    <div id="toolbar-container"></div>
                                    <div id="editor-container">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="categories">Danh mục <span class="text-danger">*</span></label>
                                    <select class="form-control @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Có thể chọn nhiều danh mục</small>
                                    @error('categories')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="regular_price">Giá gốc <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" value="{{ old('regular_price', 0) }}" required>
                                            @error('regular_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_price">Giá khuyến mãi</label>
                                            <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
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
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                                        <label class="custom-file-label" for="thumbnail">Chọn file</label>
                                    </div>
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Kích thước tối đa: 2MB. Định dạng: JPG, PNG, GIF</small>
                                </div>

                                <div class="form-group">
                                    <label for="instructor_name">Tên giảng viên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('instructor_name') is-invalid @enderror" id="instructor_name" name="instructor_name" value="{{ old('instructor_name') }}" required>
                                    @error('instructor_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="is_published">Trạng thái</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="is_published">Xuất bản ngay</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu khóa học</button>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-default">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" rel="stylesheet" />
<style>
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 0 5px;
        margin-top: 5px;
    }
    .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff;
        margin-right: 5px;
    }
    .select2-container--bootstrap4 .select2-selection--multiple {
        min-height: 45px;
    }
    .select2-container--bootstrap4 .select2-selection--multiple .select2-search__field {
        margin-top: 5px;
    }
    .ck-editor__editable {
        min-height: 400px;
    }
    .ck.ck-editor__main > .ck-editor__editable {
        background-color: #ffffff;
        border-radius: 0;
    }
    .ck.ck-editor__main > .ck-editor__editable:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>
@endpush

@push('scripts')
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file.then(file =>
                new Promise((resolve, reject) => {
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
                    .catch(error => reject(error));
                })
            );
        }

        abort() {
            // Abort upload if needed
        }
    }

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }

    ClassicEditor
        .create(document.querySelector('#description'), {
            extraPlugins: [MyCustomUploadAdapterPlugin],
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'undo',
                    'redo',
                    '|',
                    'alignment',
                    'fontColor',
                    'fontBackgroundColor'
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            }
        })
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });

    // Tự động tạo slug từ title
    document.getElementById('title').addEventListener('input', function() {
        if (!document.getElementById('slug').value) {
            document.getElementById('slug').value = this.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
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
        $('#categories').select2({
            theme: 'bootstrap4',
            placeholder: 'Chọn danh mục',
            allowClear: true,
            width: '100%',
            language: {
                noResults: function() {
                    return "Không tìm thấy kết quả";
                }
            }
        });
    });

    // Xử lý thêm gói giá
    let pricePackageCount = 1;

    $('#add-price-package').click(function() {
        const template = `
            <div class="price-package card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tên gói</label>
                                <input type="text" name="prices[${pricePackageCount}][name]" class="form-control" required value="{{ old('prices.0.name') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="number" name="prices[${pricePackageCount}][price]" class="form-control" required value="{{ old('prices.0.price', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Thời hạn (tháng)</label>
                                <input type="number" name="prices[${pricePackageCount}][duration_months]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mặc định</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="default_price_${pricePackageCount}" name="default_price" value="${pricePackageCount}" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="default_price_${pricePackageCount}">Chọn làm mặc định</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm remove-price-package">Xóa gói giá</button>
                </div>
            </div>
        `;

        $('#price-packages').append(template);
        pricePackageCount++;
    });

    // Xử lý xóa gói giá
    $(document).on('click', '.remove-price-package', function() {
        $(this).closest('.price-package').remove();
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
