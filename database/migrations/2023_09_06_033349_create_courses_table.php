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
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('slug')->unique();
            $table->foreignUuid('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreignId('level_id')->references('id')->on('course_levels')->onDelete('cascade'); // Courses Level Relationship
            $table->string('name');
            $table->text('description');
            $table->integer('period')->comment('Period in Years'); // Period in years
            $table->string('thumbnail')->nullable();
            $table->boolean('featured')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
