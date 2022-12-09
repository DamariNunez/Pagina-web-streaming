<?php

use Illuminate\Database\Seeder;

class ParticipatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['idSerie' => '1', 'idActor' => '3'],
            ['idSerie' => '1', 'idActor' => '4'],
            ['idSerie' => '1', 'idActor' => '6'],
            ['idSerie' => '1', 'idActor' => '7'],
            ['idSerie' => '2', 'idActor' => '8'],
            ['idSerie' => '2', 'idActor' => '9'],
            ['idSerie' => '3', 'idActor' => '10'],
            ['idSerie' => '3', 'idActor' => '11'],
            ['idSerie' => '3', 'idActor' => '12'],
            ['idSerie' => '3', 'idActor' => '13'],
            ['idSerie' => '4', 'idActor' => '2'],
            ['idSerie' => '4', 'idActor' => '17'],
            ['idSerie' => '4', 'idActor' => '18'],
            ['idSerie' => '4', 'idActor' => '19'],
            ['idSerie' => '5', 'idActor' => '22'],
            ['idSerie' => '5', 'idActor' => '23'],
            ['idSerie' => '5', 'idActor' => '24'],
            ['idSerie' => '6', 'idActor' => '20'],
            ['idSerie' => '6', 'idActor' => '21']
        ];
        
        DB::table('participates')->insert($data);
    }
}