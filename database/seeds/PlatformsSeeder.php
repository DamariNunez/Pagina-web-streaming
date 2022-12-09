<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Netflix'],
            ['name' => 'HBO'],
            ['name' => 'Disney+'],
            ['name' => 'Star+'],
            ['name' => 'Prime']
        ];
        
        DB::table('platforms')->insert($data);
    }
}
