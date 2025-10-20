<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusTableSeeder extends Seeder
{
    public function run(): void
    {
        $campuses = [
            ['CampusName' => 'Taradale', 'CampusCode' => 'HB'],
            ['CampusName' => 'Hastings', 'CampusCode' => 'H'],
            ['CampusName' => 'Waipukurau', 'CampusCode' => 'CHB'],
            ['CampusName' => 'Wairoa', 'CampusCode' => 'W'],
            ['CampusName' => 'Palmerston Rd', 'CampusCode' => 'TC'],
            ['CampusName' => 'Stout St', 'CampusCode' => 'SS'],
            ['CampusName' => 'Ruatoria', 'CampusCode' => 'R'],
            ['CampusName' => 'Online', 'CampusCode' => 'OL'],
            ['CampusName' => 'Auckland', 'CampusCode' => 'AK'],
            ['CampusName' => 'ISH', 'CampusCode' => 'ISH'],
            ['CampusName' => 'Maraenui', 'CampusCode' => 'M'],
            ['CampusName' => 'Tokomaru', 'CampusCode' => 'Tk'],
            ['CampusName' => 'NA', 'CampusCode' => 'NA'],
            ['CampusName' => 'Alternate Sites HB', 'CampusCode' => 'AS'],
        ];

        DB::table('campus')->insert($campuses);
    }
}
