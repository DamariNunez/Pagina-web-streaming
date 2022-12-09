<?php

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Arabic', 'iso_code' => 'ar'],
            ['name' => 'Bulgarian', 'iso_code' => 'bg'],
            ['name' => 'Catalan (Spain)', 'iso_code' => 'ca-ES'],
            ['name' => 'English (United States)', 'iso_code' => 'en-US'],
            ['name' => 'Spanish (Mexico)', 'iso_code' => 'es-MX']
        ];
        
        DB::table('languages')->insert($data);
    }
}
