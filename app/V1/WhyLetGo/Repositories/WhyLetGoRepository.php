<?php
namespace V1\WhyLetGo\Repositories;

use App\Models\WhyLetGo;
use V1\Base\Repositories\Repository;

class WhyLetGoRepository extends Repository
{
    public function __construct(WhyLetGo $whyLetGo){
        $this->set($whyLetGo);
    }

}