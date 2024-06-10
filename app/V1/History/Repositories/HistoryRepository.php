<?php
namespace V1\History\Repositories;

use App\Models\History;
use V1\Base\Repositories\Repository;

class HistoryRepository extends Repository
{
    public function __construct(History $history){
        $this->set($history);
    }

}