<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\ContactUs\Services\ContactUsService;

class ContactUsController extends Controller
{
    private ContactUsService $contactUsService;

    public function __construct(ContactUsService $contactUsService){
        $this->contactUsService = $contactUsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $contactUs = $this->contactUsService->index();
            return view('dashboard.contact_us.index',compact('contactUs'));
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact_us)
    {
        try{
            $this->contactUsService->delete($contact_us);
            toastr()->error(__('language.data_deleted_sucessfully'), __('language.delete'));
            return redirect()->route('dashboard.contact-us.index');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        } 
    }
}
