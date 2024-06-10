<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\History\Services\HistoryService;
use V1\History\Requests\HistoryRequest;

class HistoryController extends Controller
{
    private HistoryService $historyService;

    public function __construct(HistoryService $historyService){
        $this->historyService = $historyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $histories = $this->historyService->index();
            return view('dashboard.history.index',compact('histories'));
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
    public function store(HistoryRequest $request)
    {
        try{
            $data = $request->all();
            $this->historyService->store($data);
            toastr()->success(__('language.data_created_sucessfully'), __('language.add'));
            return redirect()->route('dashboard.histories.index');
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
    public function update(HistoryRequest $request, $history)
    {
        try{
            $data = $request->all();
            $this->historyService->update($data,$history);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.histories.index');
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
    public function destroy($history)
    {
        try{
            $this->historyService->delete($history);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.histories.index');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }
}
