<?php
namespace V1\Inspire\Repositories;
use V1\Base\Repositories\Repository;
use App\Models\Inspire;

class InspireRepository extends Repository
{
    public function __construct(Inspire $inspire){
        $this->set($inspire);
    }

}