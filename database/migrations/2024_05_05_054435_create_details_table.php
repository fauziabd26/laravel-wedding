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
        Schema::create('details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuId('wedding_id')->references('id')->on('weddings');
            $table->enum('type', ['Akad', 'Resepsi', 'Ngunduh Mantu']);
            $table->dateTime('date');
            $table->text('address');
            $table->text('maps');
            $table->text('calendar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
