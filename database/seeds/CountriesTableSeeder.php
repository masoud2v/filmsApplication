<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database myseeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('countries');
        $table->insert([
            'code'  => "ir",
            'title' => "Iran",
        ]);
        $table->insert([
            'code'  => "uae",
            'title' => "United Arab Emirates",
        ]);
        $table->insert([
            'code'  => "us",
            'title' => "United States Of America",
        ]);
    }
}
