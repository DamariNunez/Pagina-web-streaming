<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'Euphoria', 'idPlatform' => '1'],
            ['title' => 'Élite', 'idPlatform' => '1'],
            ['title' => 'Riverdale', 'idPlatform' => '1'],
            ['title' => 'Siempre fui yo', 'idPlatform' => '3'],
            ['title' => 'The Gilded Age', 'idPlatform' => '4'],
            ['title' => 'Holly Hobbie', 'idPlatform' => '5']
        ];
        
        DB::table('series')->insert($data);
    }
}