<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\SaveFile;
use V1\Inspire\Services\InspireService;
use V1\Inspire\Requests\InspireRequest;

class InspireController extends Controller
{
    use SaveFile;
    private InspireService $inspireService;

    public function __construct(InspireService $inspireService){
        $this->inspireService = $inspireService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $inspires = $this->inspireService->index();
            return view('dashboard.inspire.index',compact('inspires'));
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
    public function store(InspireRequest $request)
    {
        try{
            $data = $request->all();
            $data['file'] = $this->saveFile($request->file, 'images/inspires');
            $this->inspireService->store($data);
            toastr()->success(__('language.data_created_sucessfully'), __('language.add'));
            return redirect()->route('dashboard.inspires.index');
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
    public function update(InspireRequest $request, $inspire)
    {
        try{
            $data = $request->all();
            if($request->has('file'))
                $data['file'] = $this->saveFile($request->file, 'images/inspires');
            $this->inspireService->update($data,$inspire);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.inspires.index');
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
    public function destroy($inspire)
    {
        try{
            $this->inspireService->delete($inspire);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.inspires.index');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }

}
