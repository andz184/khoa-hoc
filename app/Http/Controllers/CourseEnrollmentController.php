<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseEnrollmentController extends Controller
{
    public function enroll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $course = Course::findOrFail($request->course_id);

            // Tạo thông tin thanh toán
            $amount = $course->sale_price ?? $course->regular_price;
            $transferContent = $course->title . ' + ' . $request->email;

            // Tạo QR code data theo chuẩn của TPBank
            $qrData = [
                'accountNumber' => '05261994118',
                'accountName' => 'PHAM QUANG DAT',
                'acqId' => 970423, // Mã TPBank
                'amount' => $amount,
                'addInfo' => $transferContent,
            ];

            // Lưu thông tin đăng ký
            $enrollment = Enrollment::create([
                'course_id' => $request->course_id,
                'student_name' => $request->name,
                'email' => $request->email,
                'status' => 'pending',
                'amount' => $amount,
                'transfer_content' => $transferContent
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công',
                'data' => [
                    'enrollment_id' => $enrollment->id,
                    'bank_info' => [
                        'bank_name' => 'TPBANK',
                        'account_number' => '05261994118',
                        'account_name' => 'PHAM QUANG DAT',
                        'amount' => number_format($amount) . ' VNĐ',
                        'transfer_content' => $transferContent
                    ],
                    'qr_data' => $qrData
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đăng ký khóa học',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
