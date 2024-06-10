<?php
namespace V1\CharacterizeUs\Repositories;

use App\Models\CharacterizeUs;
use V1\Base\Repositories\Repository;

class CharacterizeUsRepository extends Repository
{
    public function __construct(CharacterizeUs $characterizeUs){
        $this->set($characterizeUs);
    }

}