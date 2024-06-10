<?php
namespace V1\Products\Repositories;
use V1\Base\Repositories\Repository;
use App\Models\Product;

class ProductRepository extends Repository
{
    public function __construct(Product $product){
        $this->set($product);
    }

    public function offer($request,$id){
        return Product::findOrFail($id)->update(['offer' => 1]);
    }

    public function deleteOffer($request,$id){
        return Product::findOrFail($id)->update(['offer' => null]);
    }

    public function latest3Products(){
        return Product::latest()->take(3)->get();
    }

    public function offerProducts(){
        return Product::where('offer',1)->latest()->take(3)->get();
    }

    public function search($name){
        $locale = app()->getLocale();
        return Product::where('name_'.$locale,'like','%'.$name.'%')->paginate(12);
    }

}