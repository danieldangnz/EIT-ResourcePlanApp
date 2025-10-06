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
            $table->id();
            $table->foreignId('programme_id')->constrained()->onDelete('cascade');
            $table->string('courseDescription', 500);
            $table->string('courseCode', 50);
            $table->string('courseFullCode', 50);
            $table->boolean('onlyOneCourseForProgramme')->default(false);
            $table->enum('status', ['working', 'completed'])->default('working');
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
