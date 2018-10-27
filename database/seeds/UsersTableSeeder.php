<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database myseeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        $table = DB::table('users');

        $table->insert([
            'name'       => "Masoud Vali",
            'email'      => "masoud2v@yahoo.com",
            'password'   => Hash::make('masoud123456'),
            'created_at' => $now,
        ]);
    }
}
