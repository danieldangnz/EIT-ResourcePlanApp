<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sections')->insertOrIgnore([
            ['SectionID' => 2, 'SectionCode' => 'BRU', 'Section' => 'Business Relationship Unit'],
            ['SectionID' => 3, 'SectionCode' => 'Business', 'Section' => 'School of Business'],
            ['SectionID' => 4, 'SectionCode' => 'Comput', 'Section' => 'School of Computing'],
            ['SectionID' => 5, 'SectionCode' => 'EDSS', 'Section' => 'Education & Social Services'],
            ['SectionID' => 6, 'SectionCode' => 'ELC', 'Section' => 'English Language Centre'],
            ['SectionID' => 7, 'SectionCode' => 'FCT', 'Section' => 'Faculty of Commerce & Technology'],
            ['SectionID' => 8, 'SectionCode' => 'FEHH', 'Section' => 'Faculty of Education, Humanities and Health'],
            ['SectionID' => 9, 'SectionCode' => 'HlthSportSci', 'Section' => 'School of Health & Sport Sciences'],
            ['SectionID' => 10, 'SectionCode' => 'IS', 'Section' => 'IdeaSchool'],
            ['SectionID' => 11, 'SectionCode' => 'Nursing', 'Section' => 'School of Nursing'],
            ['SectionID' => 12, 'SectionCode' => 'SPI', 'Section' => 'School of Primary Industries'],
            ['SectionID' => 13, 'SectionCode' => 'TC', 'Section' => 'Tairawhiti'],
            ['SectionID' => 14, 'SectionCode' => 'Toiho', 'Section' => 'Toihoukura'],
            ['SectionID' => 15, 'SectionCode' => 'TourHosp', 'Section' => 'School of Tourism and Hospitality'],
            ['SectionID' => 16, 'SectionCode' => 'TradeTech', 'Section' => 'School of Trades & Technology'],
            ['SectionID' => 17, 'SectionCode' => 'TUW', 'Section' => 'School of Te Uranga Waka'],
            ['SectionID' => 18, 'SectionCode' => 'VET', 'Section' => 'Centre for Veterinary Nursing'],
            ['SectionID' => 19, 'SectionCode' => 'Vit & Wine', 'Section' => 'School of Vit & Wine'],
        ]);
    }
}
