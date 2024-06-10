<?php
namespace V1\OurVision\Services;
use V1\OurVision\Repositories\VisionRepository;

class VisionService
{

    private VisionRepository $visionRepository;

    public function __construct(VisionRepository $visionRepository){
        $this->visionRepository = $visionRepository;
    }

    public function index(){
        return $this->visionRepository->all();
    } 

    public function paginate($number){
        return $this->visionRepository->paginate($number);
    } 

    public function show($id){
        return $this->visionRepository->find($id);
    }

    public function store($request){
        return $this->visionRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->visionRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->visionRepository->find($id);
        return $model->delete();
    }

    public function latestFirst(){
        return $this->visionRepository->latestFirst();
    }
}