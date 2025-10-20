<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('programmes', function (Blueprint $table) {
            $table->string('region')->nullable()->change();
            $table->string('full_prog_code')->nullable()->change();
            $table->string('full_desc')->nullable()->change();
            $table->string('prog_stud_set')->nullable()->change();
            $table->string('prog1_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::table('programmes', function (Blueprint $table) {
            $table->string('region')->nullable(false)->change();
            $table->string('full_prog_code')->nullable(false)->change();
            $table->string('full_desc')->nullable(false)->change();
            $table->string('prog_stud_set')->nullable(false)->change();
            $table->string('prog1_code')->nullable(false)->change();
        });
    }
};
