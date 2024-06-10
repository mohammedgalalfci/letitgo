<?php
namespace V1\WhyLetGo\Services;
use V1\WhyLetGo\Repositories\WhyLetGoRepository;

class WhyLetGoService
{

    private WhyLetGoRepository $whyLetGoRepository;

    public function __construct(WhyLetGoRepository $whyLetGoRepository){
        $this->whyLetGoRepository = $whyLetGoRepository;
    }

    public function index(){
        return $this->whyLetGoRepository->all();
    } 

    public function paginate($number){
        return $this->whyLetGoRepository->paginate($number);
    } 

    public function show($id){
        return $this->whyLetGoRepository->find($id);
    }

    public function store($request){
        return $this->whyLetGoRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->whyLetGoRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->whyLetGoRepository->find($id);
        return $model->delete();
    }
}