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
        Schema::create('shippings_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->index();
            $table->string('shipping_price_company');
            $table->float('shipping_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings_prices');
    }
};
