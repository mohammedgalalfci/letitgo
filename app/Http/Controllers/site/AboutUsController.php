<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\AboutUs\Services\AboutUsService;

class AboutUsController extends Controller
{
    private AboutUsService $aboutUsService;

    public function __construct(AboutUsService $aboutUsService){
        $this->aboutUsService = $aboutUsService;
    }

    public function index()
    {
        try{
            $aboutUs = $this->aboutUsService->index();
            return view('site.about-us',compact('aboutUs'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
