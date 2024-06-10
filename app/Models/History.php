<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'history_ar',
        'history_en',
    ];

    public function getHistoryAttribute()
    {
        return $this->{'history_' . app()->getLocale()};
    }
}
