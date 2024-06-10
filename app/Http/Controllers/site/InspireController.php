<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\Inspire\Services\InspireService;

class InspireController extends Controller
{
    private InspireService $inspireService;

    public function __construct(InspireService $inspireService){
        $this->inspireService = $inspireService;
    }

    public function index()
    {
        try{
            $inspires = $this->inspireService->paginate(12);
            return view('site.inspires',compact('inspires'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
