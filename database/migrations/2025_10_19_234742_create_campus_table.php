<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campus', function (Blueprint $table) {
            $table->id();
            $table->string('CampusName');
            $table->string('CampusCode');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campus');
    }
};
