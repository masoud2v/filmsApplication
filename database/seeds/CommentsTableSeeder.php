<?php

use App\Film;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('comments');
        $now = new DateTime();
        $user = User::where('email', '=', 'masoud2v@yahoo.com')->firstOrFail();

        $commentDirs = File::directories(base_path("films-seeder/comments"));

        $comments = [
            "gladiator" => "Very amuzing movie",
            "seperation" => "I like Asghar Farhadi films",
            "sweet-november" => "cried at the end"
        ];

        foreach ($comments as $comment => $cm_value) {

            if ($film = $this->getFilm($comment)) {
                $table->insert([
                    'text' => $cm_value,
                    'user_id' => $user->id,
                    'film_id' => $film->id,
                    'created_at' => $now,
                ]);
            }
        }
    }

    private function getFilm($filmSlug)
    {
        return Film::whereSlug($filmSlug)->firstOrFail();
    }

}
