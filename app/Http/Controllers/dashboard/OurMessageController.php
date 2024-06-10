<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\OurMessage\Services\MessageService;
use V1\OurMessage\Requests\MessageRequest;

class OurMessageController extends Controller
{
    private MessageService $messageService;

    public function __construct(MessageService $messageService){
        $this->messageService = $messageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $messages = $this->messageService->index();
            return view('dashboard.our-message.index',compact('messages'));
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
    public function store(MessageRequest $request)
    {
        try{
            $data = $request->all();
            $this->messageService->store($data);
            toastr()->success(__('language.data_created_sucessfully'), __('language.add'));
            return redirect()->route('dashboard.our-messages.index');
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
    public function update(MessageRequest $request, $message)
    {
        try{
            $data = $request->all();
            $this->messageService->update($data,$message);
            toastr()->success(__('language.data_updated_sucessfully'), __('language.edit'));
            return redirect()->route('dashboard.our-messages.index');
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
    public function destroy($message)
    {
        try{
            $this->messageService->delete($message);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.our-messages.index');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }
}
