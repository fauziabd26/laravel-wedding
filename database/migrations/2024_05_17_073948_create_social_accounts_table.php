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
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->unique()->nullable();
            $table->string('fullname')->nullable()->change();
            $table->string('password')->nullable()->change();
        });

        Schema::create('social_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuId('user_id')->references('id')->on('users');
            $table->string('provider_id')->unique();
            $table->string('provider_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_accounts');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('google_id');
        });
    }
};
