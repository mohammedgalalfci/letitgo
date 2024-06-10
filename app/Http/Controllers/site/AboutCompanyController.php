<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use V1\History\Services\HistoryService;
use V1\OurGoal\Services\OurGoalService;
use V1\OurVision\Services\VisionService;
use V1\WhyLetGo\Services\WhyLetGoService;
use V1\OurMessage\Services\MessageService;
use V1\CharacterizeUs\Services\CharacterizeUsService;

class AboutCompanyController extends Controller
{
    private MessageService $messageService;
    private VisionService $visionService;
    private OurGoalService $ourGoalService;
    private CharacterizeUsService $characterizeUsService;
    private HistoryService $historyService;
    private WhyLetGoService $whyLetGoService;

    public function __construct(
        MessageService $messageService,
        VisionService $visionService,
        OurGoalService $ourGoalService,
        CharacterizeUsService $characterizeUsService,
        HistoryService $historyService,
        WhyLetGoService $whyLetGoService
    ){
        $this->messageService = $messageService;
        $this->visionService = $visionService;
        $this->ourGoalService = $ourGoalService;
        $this->characterizeUsService = $characterizeUsService;
        $this->historyService = $historyService;
        $this->whyLetGoService = $whyLetGoService;
    }

    public function aboutCompany()
    {
        try{
            $message = $this->messageService->latestFirst();
            $vision = $this->visionService->latestFirst();
            $goal = $this->ourGoalService->latestFirst();
            $characterizeUs = $this->characterizeUsService->index();
            $histories = $this->historyService->index();
            $whyLetGo = $this->whyLetGoService->index();
            return view('site.about-company',compact('message','vision','goal','characterizeUs','histories','whyLetGo'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function messageVisionGoal()
    {
        try{
            $message = $this->messageService->latestFirst();
            $vision = $this->visionService->latestFirst();
            $goal = $this->ourGoalService->latestFirst();
            return view('site.message-vision-goal',compact('message','vision','goal'));
        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }
    
}
