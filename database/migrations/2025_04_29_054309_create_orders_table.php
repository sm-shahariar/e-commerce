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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->string('phone_number');
            $table->string('address');
            $table->enum('payment_type', ['cash_on_delivery', 'online_payment'])->default('cash_on_delivery');
            $table->string('note')->nullable();
            $table->enum('status', [1, 2, 3, 4])->default(1)->comment('1=pending, 2=processing, 3=cancelled, 4=delivered');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
};
