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
        Schema::create('environment_preferred_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('environment_id')->unsigned();
            $table->timestamps();

            $table->unique(['user_id', 'environment_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('environment_id')->references('id')->on('environment_preferreds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environment_preferred_users');
    }
};
