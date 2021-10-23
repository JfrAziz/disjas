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
                    "tanggal" => $data['1'],
                    "unvr" => $data['2'],
                    "rasio" => $data['3'],
                    "spesimen" => $data['4'],
                    "reg_unvr" => $data['5'],
                    "reg_rasio" => $data['6'],
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
