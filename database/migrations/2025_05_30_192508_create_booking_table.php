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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('igloo_id')->constrained('igloos');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->date('booking_date')->default(now());
            $table->string('notes')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('employee_id')->nullable()->constrained('employee')->onDelete('set null');
            $table->boolean('early_check_in')->default(false);
            $table->boolean('late_check_out')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
