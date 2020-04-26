<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    public function __construct(){

        $this->filename = getcwd() . '/database/seeds/csv/input_cities.csv';
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
            DB::table('cities')->insert([$unit_array]);

        }
    }
}
