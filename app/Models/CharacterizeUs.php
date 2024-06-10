<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterizeUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'characterize_ar',
        'characterize_en',
    ];

    public function getCharacterizeAttribute()
    {
        return $this->{'characterize_' . app()->getLocale()};
    }
}
