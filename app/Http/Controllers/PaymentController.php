<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\VNPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected $vnpayService;

    public function __construct(VNPayService $vnpayService)
    {
        $this->vnpayService = $vnpayService;
    }

    public function createPayment(Request $request, Course $course)
    {
        try {
            DB::beginTransaction();

            // Tạo mã đơn hàng
            $orderId = 'ORDER_' . Str::random(10);

            // Tạo thông tin đơn hàng
            $orderInfo = "Thanh toan khoa hoc: " . $course->title;

            // Tạo URL thanh toán VNPay
            $paymentUrl = $this->vnpayService->createPaymentUrl(
                $orderId,
                $course->regular_price,
                $orderInfo
            );

            // Lưu thông tin đơn hàng vào session
            session(['order_id' => $orderId]);
            session(['course_id' => $course->id]);
            session(['amount' => $course->regular_price]);

            DB::commit();

            return redirect($paymentUrl);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo thanh toán: ' . $e->getMessage());
        }
    }

    public function vnpayReturn(Request $request)
    {
        try {
            $responseData = $request->all();

            // Validate response từ VNPay
            if (!$this->vnpayService->validateResponse($responseData)) {
                return redirect()->route('home')->with('error', 'Thanh toán không hợp lệ');
            }

            // Kiểm tra kết quả thanh toán
            if ($responseData['vnp_ResponseCode'] == '00') {
                // Thanh toán thành công
                $orderId = session('order_id');
                $courseId = session('course_id');
                $amount = session('amount');

                // Xử lý đăng ký khóa học
                $course = Course::findOrFail($courseId);
                $user = auth()->user();

                // Thêm logic đăng ký khóa học ở đây
                // Ví dụ: tạo bản ghi trong bảng enrollments
                DB::table('enrollments')->insert([
                    'user_id' => $user->id,
                    'course_id' => $courseId,
                    'order_id' => $orderId,
                    'amount' => $amount,
                    'status' => 'completed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Xóa session
                session()->forget(['order_id', 'course_id', 'amount']);

                return redirect()->route('home')->with('success', 'Đăng ký khóa học thành công!');
            } else {
                // Thanh toán thất bại
                return redirect()->route('home')->with('error', 'Thanh toán thất bại');
            }

        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
