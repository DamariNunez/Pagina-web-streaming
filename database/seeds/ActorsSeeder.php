<?php

use Illuminate\Database\Seeder;

class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Adria', 'lastName' => 'Arjona', 'dateOfBirth' => '1992-07-15', 'nacionality' => 'Puertorriqueña-Guatemalteca'],
            ['name' => 'William', 'lastName' => 'Levy', 'dateOfBirth' => '1980-08-29', 'nacionality' => 'Cubano'],
            ['name' => 'Sydney', 'lastName' => 'Sweeney', 'dateOfBirth' => '1997-09-12', 'nacionality' => 'Estadounidense-canadiense'],
            ['name' => 'Alexa', 'lastName' => 'Demie', 'dateOfBirth' => '1990-12-11', 'nacionality' => 'Estadounidense-mexicana'],
            ['name' => 'Will', 'lastName' => 'Smith', 'dateOfBirth' => '1968-09-25', 'nacionality' => 'Estadunidense'],
            ['name' => 'Zendaya', 'lastName' => 'Stoermer', 'dateOfBirth' => '1996-09-01', 'nacionality' => 'Estadunidense'],
            ['name' => 'Jacob', 'lastName' => 'Elordi', 'dateOfBirth' => '1997-06-26', 'nacionality' => 'Australiana'],
            ['name' => 'Itzan', 'lastName' => 'Escamilla', 'dateOfBirth' => '1997-10-31', 'nacionality' => 'Española'],
            ['name' => 'Ester', 'lastName' => 'Expósito', 'dateOfBirth' => '2000-01-26', 'nacionality' => 'Española'],
            ['name' => 'Lili', 'lastName' => 'Reinhart', 'dateOfBirth' => '1996-09-13', 'nacionality' => 'Estadunidense'],
            ['name' => 'Cole', 'lastName' => 'Sprouse', 'dateOfBirth' => '1992-08-04', 'nacionality' => 'Estadunidense-italiana'],
            ['name' => 'Camila', 'lastName' => 'Mendes', 'dateOfBirth' => '1994-06-20', 'nacionality' => 'Estadunidense'],
            ['name' => 'Madelaine', 'lastName' => 'Petsch', 'dateOfBirth' => '1994-08-18', 'nacionality' => 'Sudafricana-Estadunidense'],
            ['name' => 'Casey', 'lastName' => 'Cott', 'dateOfBirth' => '1992-08-08', 'nacionality' => 'Estadunidense'],
            ['name' => 'Keneti', 'lastName' => 'Fitzgerald', 'dateOfBirth' => '1997-06-17', 'nacionality' => 'Neozelandés'],
            ['name' => 'Vanessa', 'lastName' => 'Morgan', 'dateOfBirth' => '1992-03-23', 'nacionality' => 'Canadiense'],
            ['name' => 'Karol', 'lastName' => 'Sevilla', 'dateOfBirth' => '1999-11-09', 'nacionality' => 'Mexicana'],
            ['name' => 'Eliana', 'lastName' => 'Raventós', 'dateOfBirth' => '1995-08-16', 'nacionality' => 'Colombo-Española'],
            ['name' => 'Juliana', 'lastName' => 'Velásquez', 'dateOfBirth' => '1998-02-22', 'nacionality' => 'Colombiana'],
            ['name' => 'Ruby', 'lastName' => 'Jay', 'dateOfBirth' => '2004-12-03', 'nacionality' => 'Estadunidense'],
            ['name' => 'Hunter', 'lastName' => 'Dillon', 'dateOfBirth' => '2002-02-05', 'nacionality' => 'Canadiense'],
            ['name' => 'Audra', 'lastName' => 'McDonald', 'dateOfBirth' => '1970-07-03', 'nacionality' => 'Estadunidense'],
            ['name' => 'Donna', 'lastName' => 'Murphy', 'dateOfBirth' => '1959-03-07', 'nacionality' => 'Estadunidense'],
            ['name' => 'Christine', 'lastName' => 'Baranski', 'dateOfBirth' => '1952-05-02', 'nacionality' => 'Estadunidense'],
            ['name' => 'Carrie', 'lastName' => 'Coon', 'dateOfBirth' => '1981-01-24', 'nacionality' => 'Estadunidense'],
            ['name' => 'Louisa', 'lastName' => 'Gummer', 'dateOfBirth' => '1991-06-12', 'nacionality' => 'Estadunidense'],
            ['name' => 'Will', 'lastName' => 'Smith', 'dateOfBirth' => '2022-10-13', 'nacionality' => 'Española'],
            ['name' => 'Russell', 'lastName' => 'Crowe', 'dateOfBirth' => '1964-04-07', 'nacionality' => 'Neozelandés'],
            ['name' => 'Chris', 'lastName' => 'Hemsworth', 'dateOfBirth' => '1983-08-11', 'nacionality' => 'Australiano'],
            ['name' => 'Lily', 'lastName' => 'Collins', 'dateOfBirth' => '1989-03-18', 'nacionality' => 'Estadunidense'],
            ['name' => 'Lucas', 'lastName' => 'Bravo', 'dateOfBirth' => '1988-03-20', 'nacionality' => 'Estadunidense']

        ];
        
        DB::table('actors')->insert($data);
    }
}