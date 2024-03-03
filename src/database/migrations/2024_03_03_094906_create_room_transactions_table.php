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
        Schema::create('room_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('room_member_id')->constrained();
            $table->foreignId('room_tag_id')->constrained();
            $table->integer('amount');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_transactions');
    }
};
