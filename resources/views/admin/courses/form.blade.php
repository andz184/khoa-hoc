@csrf

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề khóa học <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title ?? '') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả khóa học</label>
            <textarea class="tinymce-editor @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $course->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="objectives" class="form-label">Mục tiêu khóa học</label>
            <textarea class="tinymce-editor @error('objectives') is-invalid @enderror" id="objectives" name="objectives">{{ old('objectives', $course->objectives ?? '') }}</textarea>
            @error('objectives')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="eligibility" class="form-label">Điều kiện tham gia</label>
            <textarea class="tinymce-editor @error('eligibility') is-invalid @enderror" id="eligibility" name="eligibility">{{ old('eligibility', $course->eligibility ?? '') }}</textarea>
            @error('eligibility')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Các gói giá <span class="text-danger">*</span></label>
            <div class="price-packages">
                @if(isset($course) && $course->prices->count() > 0)
                    @foreach($course->prices as $index => $price)
                        <div class="price-package card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Gói #<span class="package-number">{{ $index + 1 }}</span></h5>
                                    <button type="button" class="btn btn-danger btn-sm remove-price" @if($index === 0) style="display: none;" @endif>
                                        <i class="fas fa-times"></i> Xóa
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên gói</label>
                                            <input type="text" name="prices[{{ $index }}][name]" class="form-control" value="{{ $price->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Giá (VNĐ)</label>
                                            <input type="number" name="prices[{{ $index }}][price]" class="form-control" value="{{ $price->price }}" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Thời hạn (tháng)</label>
                                            <input type="number" name="prices[{{ $index }}][duration_months]" class="form-control" value="{{ $price->duration_months }}" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Thứ tự hiển thị</label>
                                            <input type="number" name="prices[{{ $index }}][sort_order]" class="form-control" value="{{ $price->sort_order }}" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mô tả quyền lợi</label>
                                    <textarea name="prices[{{ $index }}][description]" class="form-control" rows="3">{{ $price->description }}</textarea>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="default_price" value="{{ $index }}" class="form-check-input" {{ $price->is_default ? 'checked' : '' }}>
                                    <label class="form-check-label">Đặt làm gói mặc định</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="price-package card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Gói #<span class="package-number">1</span></h5>
                                <button type="button" class="btn btn-danger btn-sm remove-price" style="display: none;">
                                    <i class="fas fa-times"></i> Xóa
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tên gói</label>
                                        <input type="text" name="prices[0][name]" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Giá (VNĐ)</label>
                                        <input type="number" name="prices[0][price]" class="form-control" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Thời hạn (tháng)</label>
                                        <input type="number" name="prices[0][duration_months]" class="form-control" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Thứ tự hiển thị</label>
                                        <input type="number" name="prices[0][sort_order]" class="form-control" value="0" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mô tả quyền lợi</label>
                                <textarea name="prices[0][description]" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="default_price" value="0" class="form-check-input" checked>
                                <label class="form-check-label">Đặt làm gói mặc định</label>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button type="button" class="btn btn-success" id="add-price">
                <i class="fas fa-plus"></i> Thêm gói giá
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pricePackagesContainer = document.querySelector('.price-packages');
                const addPriceButton = document.querySelector('#add-price');

                addPriceButton.addEventListener('click', function() {
                    const packages = pricePackagesContainer.querySelectorAll('.price-package');
                    const newIndex = packages.length;

                    // Clone gói đầu tiên
                    const template = packages[0].cloneNode(true);

                    // Cập nhật số thứ tự
                    template.querySelector('.package-number').textContent = newIndex + 1;

                    // Cập nhật name của các input
                    template.querySelectorAll('input, textarea').forEach(input => {
                        if (input.name) {
                            input.name = input.name.replace('[0]', `[${newIndex}]`);
                            input.value = '';
                        }
                    });

                    // Hiện nút xóa
                    template.querySelector('.remove-price').style.display = '';

                    // Thêm vào container
                    pricePackagesContainer.appendChild(template);

                    // Cập nhật radio button
                    template.querySelector('input[type="radio"]').value = newIndex;
                });

                // Xử lý xóa gói giá
                pricePackagesContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-price')) {
                        e.preventDefault();
                        const packageToRemove = e.target.closest('.price-package');
                        packageToRemove.remove();

                        // Cập nhật lại số thứ tự
                        const packages = pricePackagesContainer.querySelectorAll('.price-package');
                        packages.forEach((pkg, index) => {
                            pkg.querySelector('.package-number').textContent = index + 1;
                            pkg.querySelectorAll('input, textarea').forEach(input => {
                                if (input.name) {
                                    input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
                                }
                            });
                            pkg.querySelector('input[type="radio"]').value = index;
                        });
                    }
                });
            });
        </script>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="available_slots" class="form-label">Số lượng học viên</label>
                    <input type="text" class="form-control @error('available_slots') is-invalid @enderror" id="available_slots" name="available_slots" value="{{ old('available_slots', $course->available_slots ?? '') }}">
                    @error('available_slots')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="schedule" class="form-label">Lịch học</label>
                    <input type="text" class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" value="{{ old('schedule', $course->schedule ?? '') }}">
                    @error('schedule')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="instructor_name" class="form-label">Tên giảng viên <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('instructor_name') is-invalid @enderror" id="instructor_name" name="instructor_name" value="{{ old('instructor_name', $course->instructor_name ?? '') }}" required>
            @error('instructor_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label">Danh mục <span class="text-danger">*</span></label>
            <select class="form-select @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $course->categories->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('categories')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Ảnh đại diện</label>
            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
            @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if(isset($course) && $course->thumbnail)
                <div class="mt-2">
                    <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" style="max-height: 200px">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $course->is_published ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Xuất bản ngay</label>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.tinymce')
