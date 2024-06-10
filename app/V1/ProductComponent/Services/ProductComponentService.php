<?php
namespace V1\ProductComponent\Services;
use V1\ProductComponent\Repositories\ProductComponentRepository;

class ProductComponentService
{

    private ProductComponentRepository $productComponentRepository;

    public function __construct(ProductComponentRepository $productComponentRepository){
        $this->productComponentRepository = $productComponentRepository;
    }

    public function index(){
        return $this->productComponentRepository->all();
    } 

    public function paginate($number){
        return $this->productComponentRepository->paginate($number);
    } 

    public function show($id){
        return $this->productComponentRepository->find($id);
    }

    public function store($request){
        return $this->productComponentRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->productComponentRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->productComponentRepository->find($id);
        return $model->delete();
    }

    public function componentsAtProduct($id){
        return $this->productComponentRepository->componentsAtProduct($id);
    }

}