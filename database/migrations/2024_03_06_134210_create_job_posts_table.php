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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('description', 1000);
            $table->string('benefit', 1000);
            $table->string('location', 50);
            $table->string('deadline', 100);

            $table->string('employer_email');
            $table->foreign('employer_email')->references('email')->on('employers')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('job_category_id');
            $table->foreign('job_category_id')->references('id')->on('job_categories')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('job_skills_id');
            $table->foreign('job_skills_id')->references('id')->on('job_skills')
            ->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
