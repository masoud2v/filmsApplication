<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
