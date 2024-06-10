<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurGoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal_ar',
        'goal_en',
    ];

    public function getGoalAttribute()
    {
        return $this->{'goal_' . app()->getLocale()};
    }
}
