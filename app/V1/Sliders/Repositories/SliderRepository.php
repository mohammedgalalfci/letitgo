<?php
namespace V1\Sliders\Repositories;
use V1\Base\Repositories\Repository;
use App\Models\Slider;

class SliderRepository extends Repository
{
    public function __construct(Slider $slider){
        $this->set($slider);
    }

    public function slidersOnSite(){
        return Slider::latest()->limit(5)->get();
    }

}