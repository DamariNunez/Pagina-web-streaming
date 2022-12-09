<?php

use Illuminate\Database\Seeder;

class DirectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Steven', 'lastName' => 'Spielberg', 'dateOfBirth' => '1946-12-18', 'nacionality' => 'Estadounidense'],
            ['name' => 'Tyler', 'lastName' => 'Romani', 'dateOfBirth' => '1962-05-16', 'nacionality' => 'Estadounidense'],
            ['name' => 'Philipp', 'lastName' => 'Barnett', 'dateOfBirth' => '1979-12-22', 'nacionality' => 'Alemana'],
            ['name' => 'Jamie', 'lastName' => 'Feldman', 'dateOfBirth' => '1978-03-07', 'nacionality' => 'Estadounidense'],
            ['name' => 'Ramón', 'lastName' => 'Salazar', 'dateOfBirth' => '1973-05-28', 'nacionality' => 'Española'],
            ['name' => 'Dani', 'lastName' => 'Orden', 'dateOfBirth' => '1989-06-02', 'nacionality' => 'Española'],
            ['name' => 'Sílvia', 'lastName' => 'Quer', 'dateOfBirth' => '1962-08-25', 'nacionality' => 'Española'],
            ['name' => 'Jorge', 'lastName' => 'Torregrossa', 'dateOfBirth' => '1973-10-03', 'nacionality' => 'Española'],
            ['name' => 'Greg', 'lastName' => 'Berlanti', 'dateOfBirth' => '1972-05-24', 'nacionality' => 'Estadounidense'],
            ['name' => 'Roberto', 'lastName' => 'Aguirre', 'dateOfBirth' => '1973-11-15', 'nacionality' => 'Nicaragüense-Estadounidense'],
            ['name' => 'Felipe', 'lastName' => 'Cano', 'dateOfBirth' => '1979-05-09', 'nacionality' => 'Colombiano'],
            ['name' => 'Salli', 'lastName' => 'Richardson', 'dateOfBirth' => '1967-11-23', 'nacionality' => 'Estadounidense'],
            ['name' => 'Stan', 'lastName' => 'Lee', 'dateOfBirth' => '1922-12-20', 'nacionality' => 'Estadounidense'],
            ['name' => 'Louis', 'lastName' => 'Esposito', 'dateOfBirth' => '1956-12-12', 'nacionality' => 'Estadounidense'],
            ['name' => 'Stephen', 'lastName' => 'Brown', 'dateOfBirth' => '1961-01-18', 'nacionality' => 'Estadounidense'],
        ];
        
        DB::table('directors')->insert($data);
    }
}