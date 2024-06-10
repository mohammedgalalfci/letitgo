<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\CharacterizeUs\Services\CharacterizeUsService;
use V1\CharacterizeUs\Requests\CharacterizeUsRequest;

class CharacterizeUsController extends Controller
{
    private CharacterizeUsService $characterizeUsService;

    public function __construct(CharacterizeUsService $characterizeUsService){
        $this->characterizeUsService = $characterizeUsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $characterizeUs = $this->characterizeUsService->index();
            return view('dashboard.characterize-us.index',compact('characterizeUs'));
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
    public function store(CharacterizeUsRequest $request)
    {
        try{
            $data = $request->all();
            $this->characterizeUsService->store($data);
            toastr()->success(__('language.data_created_sucessfully'), __('language.add'));
            return redirect()->route('dashboard.characterize-us.index');
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
    public function update(CharacterizeUsRequest $request, $characterizeUs)
    {
        try{
            $data = $request->all();
            $this->characterizeUsService->update($data,$characterizeUs);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.characterize-us.index');
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
    public function destroy($characterizeUs)
    {
        try{
            $this->characterizeUsService->delete($characterizeUs);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.characterize-us.index');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }
}
