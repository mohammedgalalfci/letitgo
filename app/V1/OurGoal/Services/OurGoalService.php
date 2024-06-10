<?php
namespace V1\OurGoal\Services;
use V1\OurGoal\Repositories\OurGoalRepository;

class OurGoalService
{

    private OurGoalRepository $ourGoalRepository;

    public function __construct(OurGoalRepository $ourGoalRepository){
        $this->ourGoalRepository = $ourGoalRepository;
    }

    public function index(){
        return $this->ourGoalRepository->all();
    } 

    public function paginate($number){
        return $this->ourGoalRepository->paginate($number);
    } 

    public function show($id){
        return $this->ourGoalRepository->find($id);
    }

    public function store($request){
        return $this->ourGoalRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->ourGoalRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->ourGoalRepository->find($id);
        return $model->delete();
    }

    public function latestFirst(){
        return $this->ourGoalRepository->latestFirst();
    }
}