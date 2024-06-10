<?php
namespace V1\OurVision\Repositories;

use App\Models\OurVision;
use V1\Base\Repositories\Repository;

class VisionRepository extends Repository
{
    public function __construct(OurVision $vision){
        $this->set($vision);
    }

    public function latestFirst(){
        return OurVision::latest()->first();
    }
}