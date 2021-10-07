<?php

namespace Database\Seeders;

use App\Models\Import;
use Illuminate\Database\Seeder;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Import::create([
                    "migas" => $data['1'],
                    "non_migas" => $data['2'],
                    "total" => $data['3'],
                    "month" => $data['4']
                ]);    
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
