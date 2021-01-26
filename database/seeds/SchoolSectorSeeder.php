<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_sectors')->insert([
            [
                'sector' => 'Public',
                'description' => 'Administered and funded by the local, state or national government',
            ],
            [
                'sector' => 'Private',
                'description' => 'Funded wholly or partly by students’ tuition and administered by a private body',
            ],
        ]);
    }
}
