<?php
namespace V1\AboutUs\Services;
use V1\AboutUs\Repositories\AboutUsRepository;

class AboutUsService
{

    private AboutUsRepository $aboutUsRepository;

    public function __construct(AboutUsRepository $aboutUsRepository){
        $this->aboutUsRepository = $aboutUsRepository;
    }

    public function index(){
        return $this->aboutUsRepository->all();
    } 

    public function paginate($number){
        return $this->aboutUsRepository->paginate($number);
    } 

    public function show($id){
        return $this->aboutUsRepository->find($id);
    }

    public function store($request){
        return $this->aboutUsRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->aboutUsRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->aboutUsRepository->find($id);
        return $model->delete();
    }
}