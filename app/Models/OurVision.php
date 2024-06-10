<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurVision extends Model
{
    use HasFactory;

    protected $fillable = [
        'vision_ar',
        'vision_en',
    ];

    public function getVisionAttribute()
    {
        return $this->{'vision_' . app()->getLocale()};
    }
}
