<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyLetGo extends Model
{
    use HasFactory;

    protected $fillable = [
        'why_ar',
        'why_en',
    ];

    public function getWhyAttribute()
    {
        return $this->{'why_' . app()->getLocale()};
    }
}
