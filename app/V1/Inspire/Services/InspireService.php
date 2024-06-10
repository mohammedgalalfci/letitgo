<?php
namespace V1\Inspire\Services;
use V1\Inspire\Repositories\InspireRepository;

class InspireService
{

    private InspireRepository $inspireRepository;

    public function __construct(InspireRepository $inspireRepository){
        $this->inspireRepository = $inspireRepository;
    }

    public function index(){
        return $this->inspireRepository->all();
    } 

    public function paginate($number){
        return $this->inspireRepository->paginate($number);
    } 

    public function show($id){
        return $this->inspireRepository->find($id);
    }

    public function store($request){
        return $this->inspireRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->inspireRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->inspireRepository->find($id);
        return $model->delete();
    }

}