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
        Schema::create('course_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('name');  // Tên gói (VD: Cơ bản, Nâng cao, Premium)
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();  // Mô tả các quyền lợi của gói
            $table->integer('duration_months')->nullable();  // Thời hạn (tháng)
            $table->boolean('is_default')->default(false);  // Gói mặc định
            $table->integer('sort_order')->default(0);  // Thứ tự hiển thị
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_prices');
    }
};
