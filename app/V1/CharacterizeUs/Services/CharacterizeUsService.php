<?php
namespace V1\CharacterizeUs\Services;
use V1\CharacterizeUs\Repositories\CharacterizeUsRepository;

class CharacterizeUsService
{

    private CharacterizeUsRepository $characterizeUsRepository;

    public function __construct(CharacterizeUsRepository $characterizeUsRepository){
        $this->characterizeUsRepository = $characterizeUsRepository;
    }

    public function index(){
        return $this->characterizeUsRepository->all();
    } 

    public function paginate($number){
        return $this->characterizeUsRepository->paginate($number);
    } 

    public function show($id){
        return $this->characterizeUsRepository->find($id);
    }

    public function store($request){
        return $this->characterizeUsRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->characterizeUsRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->characterizeUsRepository->find($id);
        return $model->delete();
    }
}