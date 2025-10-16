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
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('section_id');

            $table->string('title', 255);
            $table->string('base_code', 20);
            $table->string('region', 10);
            $table->string('intake', 10);
            $table->string('full_prog_code', 50);
            $table->string('campus', 100);
            $table->string('full_desc', 255);
            $table->string('prog_stud_set', 50);
            $table->string('prog1_code', 50);

            $table->timestamps();

            // Foreign key constraint to sections
            $table->foreign('section_id')
                  ->references('SectionID')
                  ->on('sections')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};
