<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programme;

class ProgrammeSeeder extends Seeder
{
    public function run(): void {
        Programme::factory()->count(10)->create();
    }
}