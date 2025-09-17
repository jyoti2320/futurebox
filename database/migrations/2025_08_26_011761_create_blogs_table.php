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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug')->unique();
            $table->longText('content');
            $table->unsignedBigInteger('blog_category_id');
            $table->string('image')->nullable();
            $table->date('publish_date')->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->boolean('status')->default(1)->comment('0 = draft, 1 = published');
            $table->timestamps();

            // foreign key
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
