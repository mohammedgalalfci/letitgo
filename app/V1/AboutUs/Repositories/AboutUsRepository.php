<?php
namespace V1\AboutUs\Repositories;

use App\Models\AboutUs;
use V1\Base\Repositories\Repository;

class AboutUsRepository extends Repository
{
    public function __construct(AboutUs $aboutUs){
        $this->set($aboutUs);
    }

}