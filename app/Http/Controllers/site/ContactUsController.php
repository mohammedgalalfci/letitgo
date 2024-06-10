<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\ContactUs\Requests\ContactUsRequest;
use V1\ContactUs\Services\ContactUsService;

class ContactUsController extends Controller
{
    private ContactUsService $contactUsService;
    
    public function __construct(ContactUsService $contactUsService){
        $this->contactUsService = $contactUsService;
    }

    public function store(ContactUsRequest $request)
    {
        try{
            $data = $request->all();
            $contactUs = $this->contactUsService->store($data);
            return response()->json(['success' => __('language.data_created_sucessfully')]);
        }catch(\Exception $ex){
            return response()->json(['error' => __('language.an_error_occurred_Please_try_again')]);
        }
    }

    public function index()
    {
        try{
            return view('site.contact-us');
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
