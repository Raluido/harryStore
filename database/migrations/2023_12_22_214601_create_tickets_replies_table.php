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
        Schema::create('tickets_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tickets_id')->constrained()->index()->nullable();
            $table->foreignId('user_id')->constrained()->index()->nullable();
            $table->longText('ticket_reply_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_replies');
    }
};
