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
        Schema::create('brides', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuId('wedding_id')->references('id')->on('weddings');
            $table->string('name');
            $table->string('child');
            $table->string('name_father');
            $table->string('name_mother');
            $table->string('instagram');
            $table->foreignUuId('bank_id')->references('id')->on('banks');
            $table->string('acc_name');
            $table->bigInteger('acc_number');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('photo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brides');
    }
};
