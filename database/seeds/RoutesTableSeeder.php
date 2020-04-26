<?php

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
//    /**
//     * Run the database seeds.
//     *
//     * @return void
//     */
//    public function run()
//    {
//        DB::table('routes')->insert([
//            [
//                'association_id' => '800000',
//                'route_id' => '700000',
//                'origin' => 'Lakeside Taxi Rank ',
//                'via' => 'Brits',
//                'destination' => 'Dungeni Street',
//                'created_at' => \Carbon\Carbon::now(),
//                'updated_at' => \Carbon\Carbon::now(),
//            ],
//            [
//                'association_id' => '700096',
//                'route_id' => '700000',
//                'origin' => 'Daveyton Main Taxi Rank',
//                'via' => 'Birch Road',
//                'destination' => 'Pretoria Long Distance Tax Rank',
//                'created_at' => \Carbon\Carbon::now(),
//                'updated_at' => \Carbon\Carbon::now(),
//            ],
//            [
//                'association_id' => '800000',
//                'route_id' => '700104',
//                'origin' => 'Daveyton Square Taxi Rank ',
//                'via' => 'Old Pretoria Road',
//                'destination' => 'Midrand Taxi Rank',
//                'created_at' => \Carbon\Carbon::now(),
//                'updated_at' => \Carbon\Carbon::now(),
//            ],
//        ]);
//}


        public function __construct(){


        $this->filename = getcwd() . '/database/seeds/csv/input_routes.csv';

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
            DB::table('routes')->insert([$unit_array]);

        }

    }

}
