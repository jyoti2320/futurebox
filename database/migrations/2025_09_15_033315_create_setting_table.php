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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('website_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone1', 255)->nullable();
            $table->string('phone2', 255)->nullable();
            $table->text('address', 255)->nullable();
            $table->string('fb_link', 255)->nullable();
            $table->string('twitter_link', 255)->nullable();
            $table->string('yb_link', 255)->nullable();
            $table->string('insta_link', 255)->nullable();
            $table->string('linkedin_link', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
