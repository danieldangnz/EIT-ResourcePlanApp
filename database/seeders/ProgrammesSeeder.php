<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programmes')->insert([
            [
                'section_id' => 3,
                'title' => 'Bachelor of Business Studies',
                'base_code' => 'BBS',
                'region' => 'HB',
                'intake' => 'Feb',
                'full_prog_code' => 'BBS/HB/Feb',
                'campus' => 'Taradale',
                'full_desc' => 'Bachelor of Business Studies - Taradale - Feb',
                'prog_stud_set' => 'BBS/HB/Feb/1',
                'prog1_code' => 'BBS/Taradale/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'Bachelor of Business Studies',
                'base_code' => 'BBS',
                'region' => 'TC',
                'intake' => 'Feb',
                'full_prog_code' => 'BBS/TC/Feb',
                'campus' => 'Palmerston Rd',
                'full_desc' => 'Bachelor of Business Studies - Palmerston Rd - Feb',
                'prog_stud_set' => 'BBS/TC/Feb/1',
                'prog1_code' => 'BBS/Palmerston Rd/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'Bachelor of Accounting',
                'base_code' => 'BoA',
                'region' => 'HB',
                'intake' => 'Feb',
                'full_prog_code' => 'BoA/HB/Feb',
                'campus' => 'Taradale',
                'full_desc' => 'Bachelor of Accounting - Taradale - Feb',
                'prog_stud_set' => 'BoA/HB/Feb/1',
                'prog1_code' => 'BoA/Taradale/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'Bachelor of Accounting',
                'base_code' => 'BoA',
                'region' => 'SS',
                'intake' => 'Feb',
                'full_prog_code' => 'BoA/SS/Feb',
                'campus' => 'Stout St',
                'full_desc' => 'Bachelor of Accounting - Stout St - Feb',
                'prog_stud_set' => 'BoA/SS/Feb/1',
                'prog1_code' => 'BoA/Stout St/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'Bachelor of Accounting',
                'base_code' => 'BoA',
                'region' => 'W',
                'intake' => 'Jul',
                'full_prog_code' => 'BoA/W/Jul',
                'campus' => 'Wairoa',
                'full_desc' => 'Bachelor of Accounting - Wairoa - Jul',
                'prog_stud_set' => 'BoA/W/Jul/1',
                'prog1_code' => 'BoA/Wairoa/Jul'
            ],
            [
                'section_id' => 3,
                'title' => 'New Zealand Certificate in Business (Accounting Support Services) (L4)',
                'base_code' => 'CBASS',
                'region' => 'HB',
                'intake' => 'Feb',
                'full_prog_code' => 'CBASS/HB/Feb',
                'campus' => 'Taradale',
                'full_desc' => 'New Zealand Certificate in Business (Accounting Support Services) (L4) - Taradale - Feb',
                'prog_stud_set' => 'CBASS/HB/Feb/1',
                'prog1_code' => 'CBASS/Taradale/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'New Zealand Diploma in Business L5',
                'base_code' => 'NZDB',
                'region' => 'HB',
                'intake' => 'Feb',
                'full_prog_code' => 'NZDB/HB/Feb',
                'campus' => 'Taradale',
                'full_desc' => 'New Zealand Diploma in Business L5 - Taradale - Feb',
                'prog_stud_set' => 'NZDB/HB/Feb/1',
                'prog1_code' => 'NZDB/Taradale/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'New Zealand Diploma in Business L5',
                'base_code' => 'NZDB',
                'region' => 'TC',
                'intake' => 'Feb',
                'full_prog_code' => 'NZDB/TC/Feb',
                'campus' => 'Palmerston Rd',
                'full_desc' => 'New Zealand Diploma in Business L5 - Palmerston Rd - Feb',
                'prog_stud_set' => 'NZDB/TC/Feb/1',
                'prog1_code' => 'NZDB/Palmerston Rd/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'School-based Activities',
                'base_code' => 'SBA',
                'region' => 'HB',
                'intake' => 'Feb',
                'full_prog_code' => 'SBA/HB/Feb',
                'campus' => 'Taradale',
                'full_desc' => 'School-based Activities - Taradale - Feb',
                'prog_stud_set' => 'SBA/HB/Feb/1',
                'prog1_code' => 'SBA/Taradale/Feb'
            ],
            [
                'section_id' => 3,
                'title' => 'School-based Activities',
                'base_code' => 'SBA',
                'region' => 'TC',
                'intake' => 'Feb',
                'full_prog_code' => 'SBA/TC/Feb',
                'campus' => 'Palmerston Rd',
                'full_desc' => 'School-based Activities - Palmerston Rd - Feb',
                'prog_stud_set' => 'SBA/TC/Feb/1',
                'prog1_code' => 'SBA/Palmerston Rd/Feb'
            ],
        ]);
    }
}
