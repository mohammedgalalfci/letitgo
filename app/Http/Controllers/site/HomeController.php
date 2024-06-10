<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\Sliders\Services\SliderService;
use V1\Products\Services\ProductService;

class HomeController extends Controller
{
    private SliderService $sliderService;
    private ProductService $productService;

    public function __construct(SliderService $sliderService,ProductService $productService){
        $this->sliderService = $sliderService;
        $this->productService = $productService;
    }

    public function index()
    {
        try{
            $sliders = $this->sliderService->index();
            $latest3Products = $this->productService->latest3Products();
            $offers = $this->productService->offerProducts();
            $products = $this->productService->index();
            return view('site.index',compact('sliders','latest3Products','products','offers'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
