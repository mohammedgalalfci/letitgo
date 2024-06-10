<?php
namespace V1\ContactUs\Repositories;
use V1\Base\Repositories\Repository;
use App\Models\ContactUs;

class ContactUsRepository extends Repository
{
    public function __construct(ContactUs $contactUs){
        $this->set($contactUs);
    }
}