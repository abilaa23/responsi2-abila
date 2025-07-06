<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->decimal('total_paid', 12, 2);
            $table->string('platform');
            $table->integer('quantity');
            $table->timestamps();
        });

    }

    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
