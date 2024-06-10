<?php
namespace V1\ContactUs\Services;
use V1\ContactUs\Repositories\ContactUsRepository;

class ContactUsService
{

    private ContactUsRepository $contactUsRepository;

    public function __construct(ContactUsRepository $contactUsRepository){
        $this->contactUsRepository = $contactUsRepository;
    }

    public function index(){
        return $this->contactUsRepository->all();
    } 

    public function paginate($number){
        return $this->contactUsRepository->paginate($number);
    } 

    public function show($id){
        return $this->contactUsRepository->find($id);
    }

    public function store($request){
        return $this->contactUsRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->contactUsRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->contactUsRepository->find($id);
        return $model->delete();
    }
}