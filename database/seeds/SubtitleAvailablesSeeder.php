<?php

use Illuminate\Database\Seeder;

class SubtitleAvailablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['idLanguage' => '1', 'idSerie' => '1'],
            ['idLanguage' => '2', 'idSerie' => '1'],
            ['idLanguage' => '1', 'idSerie' => '2'],
            ['idLanguage' => '3', 'idSerie' => '2'],
            ['idLanguage' => '2', 'idSerie' => '2'],
            ['idLanguage' => '4', 'idSerie' => '3'],
            ['idLanguage' => '4', 'idSerie' => '3'],
            ['idLanguage' => '5', 'idSerie' => '4'],
            ['idLanguage' => '3', 'idSerie' => '5'],
            ['idLanguage' => '5', 'idSerie' => '6']             
        ];
        
        DB::table('subtitle_availables')->insert($data);
    }
}