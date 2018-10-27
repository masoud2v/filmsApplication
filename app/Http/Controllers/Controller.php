<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $uploadDir = "uploads";


    public function generateSlug($title)
    {
        return Str::slug($title, '-', 'en');
    }

    public function uploadImage(Model $model, $field = "photo") {

        $file = request()->file($field);
        if ($file) {
            $destinationPath = $this->uploadDir;
            $name = uniqid() . '.' . mb_strtolower($file->getClientOriginalExtension());
            $file->move($destinationPath, $name);

            $photo = new Photo();
            $photo->path = "/" . $destinationPath . "/" . $name;
            if ($photo->save()) {
                $model->photo_id = $photo->id;
                $model->save();
            }
        }

        return $model;
    }
}
