<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained('enrollments')->onDelete('cascade');
            $table->string('transaction_id')->nullable(); // ID giao dịch từ ngân hàng
            $table->string('bank_ref')->nullable(); // Mã tham chiếu từ ngân hàng
            $table->decimal('amount', 12, 0); // Số tiền giao dịch
            $table->string('description'); // Nội dung chuyển khoản
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->json('bank_response')->nullable(); // Lưu toàn bộ response từ ngân hàng
            $table->string('payment_method')->default('bank_transfer'); // Phương thức thanh toán
            $table->timestamp('paid_at')->nullable(); // Thời gian thanh toán thành công
            $table->timestamps();

            // Thêm index cho các trường thường xuyên tìm kiếm
            $table->index('transaction_id');
            $table->index('bank_ref');
            $table->index('status');
            $table->index('paid_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
