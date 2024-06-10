<?php
namespace V1\OurMessage\Repositories;

use App\Models\OurMessage;
use V1\Base\Repositories\Repository;

class MessageRepository extends Repository
{
    public function __construct(OurMessage $message){
        $this->set($message);
    }

    public function latestFirst(){
        return OurMessage::latest()->first();
    }
}