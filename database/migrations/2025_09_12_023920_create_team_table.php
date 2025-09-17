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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name', 255);
            $table->string('position', 255);
            $table->string('qualifications', 255);
            $table->string('location', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->default(1)->comment('0 = inactive, 1 = active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};
