<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoria;

class kategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path("sample_data/kategoriak_minta.csv");
        if(!file_exists($filePath)){
            return;
        }
        $file = fopen($filePath,"r");
        $header = fgetcsv($file,0,";");
        while( ($sor=fgetcsv($file,0,";")) !== false ){
            $adat = array_combine($header,$sor);
            
            Kategoria::create(
                [
                    'nev' => $adat['nev']
                ]
            );
        }
        fclose($file);
    }
}
