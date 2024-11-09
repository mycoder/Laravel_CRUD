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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->string('product_id')->unique(); // Unique and required
            $table->string('name'); // Required
            $table->text('description')->nullable(); // Optional
            $table->decimal('price', 10, 2); // Required with 10 total digits, 2 after the decimal
            $table->integer('stock')->nullable(); // Optional
            $table->string('image')->nullable(); // Optional
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
