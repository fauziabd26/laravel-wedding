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
        Schema::create('redaksi_kata', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuId('wedding_id')->references('id')->on('weddings');
            $table->longText('kata')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('invitations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuId('wedding_id')->references('id')->on('weddings');
            $table->foreignUuId('kata_id')->references('id')->on('redaksi_kata');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(['redaksi_kata', 'invitations']);
    }
};
