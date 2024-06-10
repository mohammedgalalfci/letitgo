<?php
namespace V1\OurGoal\Repositories;

use App\Models\OurGoal;
use V1\Base\Repositories\Repository;

class OurGoalRepository extends Repository
{
    public function __construct(OurGoal $ourGoal){
        $this->set($ourGoal);
    }

    public function latestFirst(){
        return OurGoal::latest()->first();
    }
}