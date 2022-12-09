<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlatformsSeeder::class);
        $this->call(ActorsSeeder::class);
        $this->call(DirectorsSeeder::class);
        $this->call(SeriesSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(ParticipatesSeeder::class);
        $this->call(DirectsSeeder::class);
        $this->call(AudioAvailablesSeeder::class);
        $this->call(SubtitleAvailablesSeeder::class);
    }
}
