<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\WhyLetGo\Services\WhyLetGoService;

class WhyLetItGoController extends Controller
{
    private WhyLetGoService $whyLetGoService;

    public function __construct(WhyLetGoService $whyLetGoService){
        $this->whyLetGoService = $whyLetGoService;
    }

    public function index()
    {
        try{
            $whyLetGo = $this->whyLetGoService->index();
            return view('site.why-let-go',compact('whyLetGo'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
