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
        Schema::create('admin_blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description',1000)->nullable();
            $table->string('status')->default('Draft');
            $table->string('featured_image')->nullable();

            $table->unsignedBigInteger('admin_blog_category_id');
            $table->foreign('admin_blog_category_id')->references('id')->on('admin_blog_categories');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_blog_posts');
    }
};
