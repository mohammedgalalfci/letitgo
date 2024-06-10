<?php
namespace V1\ProductComponent\Repositories;
use V1\Base\Repositories\Repository;
use App\Models\ProductComponent;

class ProductComponentRepository extends Repository
{
    public function __construct(ProductComponent $productComponent){
        $this->set($productComponent);
    }

    public function componentsAtProduct($id){
        return ProductComponent::where('product_id',$id)->get();
    }

}