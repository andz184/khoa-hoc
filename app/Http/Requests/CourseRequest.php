<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $course = $this->route('course');
        $courseId = $course ? $course->id : null;

        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:courses,slug,' . $courseId,
            'description' => 'nullable|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'instructor_name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'is_published' => 'boolean',
            'allow_registration' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề khóa học là bắt buộc',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự',
            'regular_price.required' => 'Giá gốc là bắt buộc',
            'regular_price.numeric' => 'Giá gốc phải là số',
            'regular_price.min' => 'Giá gốc không được âm',
            'sale_price.numeric' => 'Giá khuyến mãi phải là số',
            'sale_price.min' => 'Giá khuyến mãi không được âm',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'instructor_name.required' => 'Tên giảng viên là bắt buộc',
            'categories.required' => 'Phải chọn ít nhất một danh mục',
            'thumbnail.image' => 'File phải là hình ảnh',
            'thumbnail.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'thumbnail.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
        ];
    }

    protected function prepareForValidation()
    {
        // Chuyển đổi chuỗi rỗng thành null cho sale_price
        if ($this->has('sale_price') && $this->input('sale_price') === '') {
            $this->merge([
                'sale_price' => null
            ]);
        }

        // Đảm bảo is_published và allow_registration là boolean
        $this->merge([
            'is_published' => $this->has('is_published'),
            'allow_registration' => $this->has('allow_registration')
        ]);
    }
}
