<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function __construct(){

        $this->table = 'unit';
        $this->filename = getcwd() . '/database/seeds/csv/input_districts.csv';

    }


    private function seedFromCSV($filename, $delimitor = ",")
    {
        if(!file_exists($filename) )
        {
            echo "file not exist";
            return FALSE;
        }

        if( !is_readable($filename))
        {
            echo "not readable";
            return FALSE;

        }

        $header = NULL;
        $data = array();

        if(($handle = fopen($filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, 1000, $delimitor)) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {

                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $seedData = $this->seedFromCSV($this->filename, ',');

        foreach ($seedData as $unit_array)
        {
            DB::table('districts')->insert([$unit_array]);

        }


    }
}
