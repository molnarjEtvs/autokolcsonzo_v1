<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Auto;
class autoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path("sample_data/autok_minta.csv");
        if(!file_exists($filePath)){
            return;
        }
        $file = fopen($filePath,"r");
        $header = fgetcsv($file,0,";");
        while( ($sor=fgetcsv($file,0,";")) !== false ){
            $adat = array_combine($header,$sor);
            Auto::create(
                [
                    'kategoria_id' => $adat['kategoria_id'],
                    'tipus' => $adat['tipus'],
                    'rendszam' => $adat['rendszam'],
                    'napi_ar' => $adat['napi_ar'],
                    'elerheto' => (bool)$adat['elerheto'],
                    'rogzites_datuma' => $adat['rogzites_datuma']
                ]
            );
        }
        fclose($file);
    }
}
