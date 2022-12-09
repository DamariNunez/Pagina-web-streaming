<?php

use Illuminate\Database\Seeder;

class AudioAvailablesSeeder extends Seeder
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
            ['idLanguage' => '2', 'idSerie' => '3'],
            ['idLanguage' => '4', 'idSerie' => '3'],
            ['idLanguage' => '4', 'idSerie' => '4'],
            ['idLanguage' => '5', 'idSerie' => '5'],
            ['idLanguage' => '3', 'idSerie' => '5'],
            ['idLanguage' => '5', 'idSerie' => '6']             
        ];
        
        DB::table('audio_availables')->insert($data);
    }
}