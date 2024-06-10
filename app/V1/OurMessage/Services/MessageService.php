<?php
namespace V1\OurMessage\Services;
use V1\OurMessage\Repositories\MessageRepository;

class MessageService
{

    private MessageRepository $messageRepository;

    public function __construct(MessageRepository $messageRepository){
        $this->messageRepository = $messageRepository;
    }

    public function index(){
        return $this->messageRepository->all();
    } 

    public function paginate($number){
        return $this->messageRepository->paginate($number);
    } 

    public function show($id){
        return $this->messageRepository->find($id);
    }

    public function store($request){
        return $this->messageRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->messageRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->messageRepository->find($id);
        return $model->delete();
    }

    public function latestFirst(){
        return $this->messageRepository->latestFirst();
    }
}