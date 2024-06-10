<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\Products\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function index()
    {
        try{
            $products = $this->productService->paginate(12);
            return view('site.products',compact('products'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function show($id)
    {
        try{
            $product = $this->productService->show($id);
            $products = $this->productService->index();
            return view('site.product-details',compact('product','products'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        try{
            $name = $request->name;
            $products = $this->productService->search($name);
            return view('site.products',compact('products'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
