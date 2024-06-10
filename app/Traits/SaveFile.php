<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SaveFile
{
    public function saveFile($file, $folder)
    {
        $extention = $file->getClientOriginalExtension();
        $file_name = md5(time() . Str::random(100)) . '.' . $extention;
        $file->move($folder, $file_name);
        return $file_name;
    }
}