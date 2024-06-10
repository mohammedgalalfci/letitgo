<?php
namespace V1\History\Services;
use V1\History\Repositories\HistoryRepository;

class HistoryService
{

    private HistoryRepository $historyRepository;

    public function __construct(HistoryRepository $historyRepository){
        $this->historyRepository = $historyRepository;
    }

    public function index(){
        return $this->historyRepository->all();
    } 

    public function paginate($number){
        return $this->historyRepository->paginate($number);
    } 

    public function show($id){
        return $this->historyRepository->find($id);
    }

    public function store($request){
        return $this->historyRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->historyRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->historyRepository->find($id);
        return $model->delete();
    }
}