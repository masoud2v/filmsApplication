<?php

use App\Country;
use App\Genre;
use App\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database myseeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('films');
        $now = new DateTime();

        $table->insert([
            'name'          => "Gladiator",
            'slug'          => 'gladiator',
            'description'   => 'This film is about Roman Empire Fights',
            'realease_date' => '2010-01-01',
            'rating'        => 3,
            'ticket_price'  => 10.00,
            'country_id'    => $this->getCountry('us')->id,
            'genre_id'      => $this->getGenre('action')->id,
            'photo_id'      => $this->copySamplePhoto('me.png')->id,
            'created_at'    => $now,
        ]);

        $table->insert([
            'name'          => "A Seperation",
            'slug'          => 'seperation',
            'description'   => "About Divorce and conflicts in a family",
            'realease_date' => '2015-01-01',
            'rating'        => 5,
            'ticket_price'  => 15.99,
            'country_id'    => $this->getCountry('ir')->id,
            'genre_id'      => $this->getGenre('persian')->id,
            'photo_id'      => $this->copySamplePhoto('me.png')->id,
            'created_at'    => $now,
        ]);

        $table->insert([
            'name'          => "sweet november",
            'slug'          => "sweet-november",
            'description'   => "Story of two friends which one of them has cancer",
            'realease_date' => '2007-10-01',
            'rating'        => 4,
            'ticket_price'  => 12.49,
            'country_id'    => $this->getCountry('tr')->id,
            'genre_id'      => $this->getGenre('drama')->id,
            'photo_id'      => $this->copySamplePhoto('me.png')->id,
            'created_at'    => $now,
        ]);
    }

    private function getCountry($countryCode) {
        return Country::where('code', '=', $countryCode)->firstOrFail();
    }

    private function getGenre($genreName) {
        return Genre::where('name', '=', $genreName)->firstOrFail();
    }

    private function copySamplePhoto($filename)
    {
        $ext = mb_strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $name = uniqid() . ".$ext";
        $imagePath = "/uploads/$name";

        $from = base_path("/project_samples/$filename");
        $dest = public_path($imagePath);

        File::copy($from, $dest);

        $image = new Photo();
        $image->path = $imagePath;
        $image->save();

        return $image;
    }
}
