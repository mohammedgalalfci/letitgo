<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\CharacterizeUs\Services\CharacterizeUsService;

class CharacterizeUsController extends Controller
{
    private CharacterizeUsService $characterizeUsService;

    public function __construct(CharacterizeUsService $characterizeUsService){
        $this->characterizeUsService = $characterizeUsService;
    }

    public function index()
    {
        try{
            $characterizeUs = $this->characterizeUsService->index();
            return view('site.characterized-us',compact('characterizeUs'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
