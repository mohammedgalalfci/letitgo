<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_ar',
        'message_en',
    ];

    public function getMessageAttribute()
    {
        return $this->{'message_' . app()->getLocale()};
    }
}
