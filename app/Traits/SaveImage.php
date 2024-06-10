<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait SaveImage
{
    public function saveImage($photo, $folder)
    {
        $extention = $photo->getClientOriginalExtension();
        $image_name = md5(time() . Str::random(100)) . '.' . $extention;
        $img = Image::make($photo->path())->encode('webp', 50);
        $img->save($folder . '/' . $image_name, 50);
        return $image_name;
    }
}
