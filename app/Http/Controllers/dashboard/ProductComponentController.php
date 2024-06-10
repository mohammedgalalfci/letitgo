<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductComponent;
use Illuminate\Http\Request;
use V1\ProductComponent\Services\ProductComponentService;
use V1\Products\Services\ProductService;
use V1\ProductComponent\Requests\ProductComponentRequest;

class ProductComponentController extends Controller
{
    private ProductComponentService $productComponentService;
    private ProductService $productService;

    public function __construct(ProductComponentService $productComponentService,ProductService $productService){
        $this->productComponentService = $productComponentService;
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $productComponents = $this->productComponentService->index();
            return view('dashboard.products.components',compact('productComponents'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function componentsAtProduct($product)
    {
        try{
            $productComponents = $this->productComponentService->componentsAtProduct($product);
            $product = $this->productService->show($product);
            return view('dashboard.products.components',compact('productComponents','product'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductComponentRequest $request)
    {
        try{
            $data = $request->all();
            $productComponent = $this->productComponentService->store($data);
            toastr()->success(__('language.data_created_sucessfully'), __('language.add'));
            return redirect()->route('dashboard.product.components',$productComponent->product_id);
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductComponentRequest $request, $component)
    {
        try{
            $data = $request->all();
            $productComponent = $this->productComponentService->show($component);
            $this->productComponentService->update($data,$component);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.product.components',$productComponent->product_id);
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($component)
    {
        try{
            $productComponent = $this->productComponentService->show($component);
            $this->productComponentService->delete($component);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.product.components',$productComponent->product_id);
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }
}
