<?php

namespace Database\Seeders;

use App\Models\Unvr;
use Illuminate\Database\Seeder;

class UnvrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/unvr.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Unvr::create([
                    "tanggal" => $data['0'],
                    "unvr" => $data['1'],
                    "rasio" => $data['2'],
                    "spesimen" => $data['3']
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
