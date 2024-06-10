<?php
namespace V1\Sliders\Services;
use V1\Sliders\Repositories\SliderRepository;

class SliderService
{

    private SliderRepository $sliderRepository;

    public function __construct(SliderRepository $sliderRepository){
        $this->sliderRepository = $sliderRepository;
    }

    public function index(){
        return $this->sliderRepository->all();
    } 

    public function paginate($number){
        return $this->sliderRepository->paginate($number);
    } 

    public function show($id){
        return $this->sliderRepository->find($id);
    }

    public function store($request){
        return $this->sliderRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->sliderRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->sliderRepository->find($id);
        return $model->delete();
    }

    public function slidersOnSite(){
        return $this->sliderRepository->slidersOnSite();
    }
}