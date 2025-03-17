<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('subcategory_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->text('product_imgs');
            $table->text('product_thumb');
            $table->string('product_name');
            $table->integer('product_new_price');
            $table->integer('product_old_price');
            $table->text('product_short_desc');
            $table->text('product_long_desc');
            $table->integer('product_qty');
            $table->text('product_size');
            $table->integer('product_weight');
            $table->text('product_color');
            $table->timestamps();
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
