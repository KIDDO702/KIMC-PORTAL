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
        Schema::create('departments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('type')->default(0)->comment('Academic / Administrative'); // Academic / Administrative
            $table->longText('description')->nullable();
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('featured')->default(0); // Checks if its feauted on the website
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
