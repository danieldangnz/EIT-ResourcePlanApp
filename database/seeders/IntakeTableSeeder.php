<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntakeTableSeeder extends Seeder
{
    public function run(): void
    {
        $intakes = [
            ['Intake' => '1'],
            ['Intake' => '2'],
            ['Intake' => '3'],
            ['Intake' => '4'],
            ['Intake' => '5'],
            ['Intake' => '6'],
            ['Intake' => '7'],
            ['Intake' => '8'],
            ['Intake' => 'Jan'],
            ['Intake' => 'Feb'],
            ['Intake' => 'Mar'],
            ['Intake' => 'Apr'],
            ['Intake' => 'May'],
            ['Intake' => 'Jun'],
            ['Intake' => 'Jul'],
            ['Intake' => 'Aug'],
            ['Intake' => 'Sept'],
            ['Intake' => 'Oct'],
            ['Intake' => 'Nov'],
            ['Intake' => 'Dec'],
            ['Intake' => 'Apr24'],
            ['Intake' => 'May24'],
            ['Intake' => 'Jun24'],
            ['Intake' => 'Jul24'],
            ['Intake' => 'Aug24'],
            ['Intake' => 'Sept24'],
            ['Intake' => 'Oct24'],
            ['Intake' => 'Nov24'],
            ['Intake' => 'Dec24'],
            ['Intake' => 'NA'],
        ];

        DB::table('intake')->insert($intakes);
    }
}
