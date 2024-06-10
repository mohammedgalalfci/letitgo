<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\History\Services\HistoryService;

class HistoryController extends Controller
{
    private HistoryService $historyService;

    public function __construct(HistoryService $historyService){
        $this->historyService = $historyService;
    }

    public function index()
    {
        try{
            $histories = $this->historyService->index();
            return view('site.history',compact('histories'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
