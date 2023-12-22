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
            $table->id();
            $table->foreignId('category_id')->constrained()->index();
            $table->foreignId('discount_id')->constrained()->nullable();
            $table->string('product_code');
            $table->string('product_title');
            $table->string('product_photo');
            $table->string('product_description');
            $table->float('product_price', 8, 4);
            $table->string('product_rate')->default(100);
            $table->string('product_tax');
            $table->longText('product_tags');
            $table->char('product_visible')->default(1);
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
