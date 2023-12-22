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
        Schema::create('shippings_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->index();
            $table->string('tracking_number');
            $table->date('departure');
            $table->date('estimated_arrived');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings_registers');
    }
};
