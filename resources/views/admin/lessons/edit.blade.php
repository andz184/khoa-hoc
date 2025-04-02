@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa bài học - {{ $course->title }}</h3>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('admin.courses.lessons.update', [$course, $lesson]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Tiêu đề bài học <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả bài học <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $lesson->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="objectives">Mục tiêu bài học <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('objectives') is-invalid @enderror" id="objectives" name="objectives" rows="4" required>{{ old('objectives', $lesson->objectives) }}</textarea>
                            @error('objectives')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="youtube_link">Link YouTube <span class="text-danger">*</span></label>
                            <input type="url" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link" name="youtube_link" value="{{ old('youtube_link', $lesson->youtube_link) }}" required>
                            @error('youtube_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="download_link">File JSON tải xuống</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('download_link') is-invalid @enderror" id="download_link" name="download_link" accept=".json">
                                <label class="custom-file-label" for="download_link">
                                    {{ $lesson->original_filename ?? 'Chọn file JSON' }}
                                </label>
                            </div>
                            @if($lesson->download_link)
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $lesson->download_link) }}"
                                       class="btn btn-sm btn-info"
                                       download="{{ $lesson->original_filename }}"
                                       target="_blank">
                                        <i class="fas fa-download"></i> Tải xuống file hiện tại
                                    </a>
                                    <small class="text-muted ml-2">File hiện tại: {{ $lesson->original_filename }}</small>
                                </div>
                            @endif
                            @error('download_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Để trống nếu không muốn thay đổi file</small>
                        </div>

                        <div class="form-group">
                            <label for="sort_order">Thứ tự hiển thị</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $lesson->sort_order) }}" min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" {{ old('is_published', $lesson->is_published) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_published">Xuất bản ngay</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_visible" name="is_visible" value="1" {{ old('is_visible', $lesson->is_visible) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_visible">Hiển thị bài học</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật bài học</button>
                            <a href="{{ route('admin.courses.lessons.index', $course) }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Cập nhật label khi chọn file mới
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = e.target.files[0]?.name || 'Chọn file JSON';
    var label = e.target.nextElementSibling;
    label.textContent = fileName;
});
</script>
@endpush
@endsection
