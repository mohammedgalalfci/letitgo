<?php
namespace V1\Users\Repositories;
use V1\Base\Repositories\Repository;
use App\Models\User;

class UserRepository extends Repository
{
    public function __construct(User $user){
        $this->set($user);
    }
}