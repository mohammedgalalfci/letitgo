<?php
namespace V1\Products\Services;
use V1\Products\Repositories\ProductRepository;

class ProductService
{

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }

    public function index(){
        return $this->productRepository->all();
    } 

    public function paginate($number){
        return $this->productRepository->paginate($number);
    } 

    public function show($id){
        return $this->productRepository->find($id);
    }

    public function store($request){
        return $this->productRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->productRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->productRepository->find($id);
        return $model->delete();
    }

    public function offer($request,$id){
        return $this->productRepository->offer($request,$id);
    }

    public function deleteOffer($request,$id){
        return $this->productRepository->deleteOffer($request,$id);
    }

    public function latest3Products(){
        return $this->productRepository->latest3Products();
    }

    public function offerProducts(){
        return $this->productRepository->offerProducts();
    }

    public function search($name){
        return $this->productRepository->search($name);
    }

}