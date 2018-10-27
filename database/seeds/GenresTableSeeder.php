<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database myseeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();

        $table = DB::table('genres');
        $table->insert([
            'name'       => "drama",
            'created_at' => $now,
        ]);

        $table->insert([
            'name'       => "action",
            'created_at' => $now,
        ]);

        $table->insert([
            'name'       => "persian",
            'created_at' => $now,
        ]);
    }
}
