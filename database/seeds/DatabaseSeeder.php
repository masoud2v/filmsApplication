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
        $this->call([
            UsersTableSeeder::class,
            CountriesTableSeeder::class,
            GenresTableSeeder::class,
            FilmsTableSeeder::class,
            CommentsTableSeeder::class,
        ]);
    }
}
