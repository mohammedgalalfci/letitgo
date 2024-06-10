<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\OurGoal\Services\OurGoalService;
use V1\OurGoal\Requests\OurGoalRequest;

class OurGoalController extends Controller
{
    private OurGoalService $ourGoalService;

    public function __construct(OurGoalService $ourGoalService){
        $this->ourGoalService = $ourGoalService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $goals = $this->ourGoalService->index();
            return view('dashboard.our-goal.index',compact('goals'));
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
    public function store(OurGoalRequest $request)
    {
        try{
            $data = $request->all();
            $this->ourGoalService->store($data);
            toastr()->success(__('language.data_created_sucessfully'), __('language.add'));
            return redirect()->route('dashboard.our-goals.index');
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
    public function update(OurGoalRequest $request, $goal)
    {
        try{
            $data = $request->all();
            $this->ourGoalService->update($data,$goal);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.our-goals.index');
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
    public function destroy($goal)
    {
        try{
            $this->ourGoalService->delete($goal);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.our-goals.index');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }
}
