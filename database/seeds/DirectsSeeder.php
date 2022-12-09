<?php

use Illuminate\Database\Seeder;

class DirectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['idSerie' => '1', 'idDirector' => '2'],
            ['idSerie' => '1', 'idDirector' => '3'],
            ['idSerie' => '1', 'idDirector' => '4'],
            ['idSerie' => '2', 'idDirector' => '5'],
            ['idSerie' => '2', 'idDirector' => '6'],
            ['idSerie' => '2', 'idDirector' => '7'],
            ['idSerie' => '2', 'idDirector' => '8'],
            ['idSerie' => '3', 'idDirector' => '9'],
            ['idSerie' => '4', 'idDirector' => '2'],
            ['idSerie' => '4', 'idDirector' => '11'],
            ['idSerie' => '5', 'idDirector' => '12'],
            ['idSerie' => '6', 'idDirector' => '13']
        ];
        
        DB::table('directs')->insert($data);
    }
}