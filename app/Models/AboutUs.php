<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_ar',
        'about_en',
    ];

    public function getAboutAttribute()
    {
        return $this->{'about_' . app()->getLocale()};
    }
}
