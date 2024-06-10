<?php
namespace V1\Users\Services;
use V1\Users\Repositories\UserRepository;

class UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function index(){
        return $this->userRepository->all();
    } 

    public function paginate($number){
        return $this->userRepository->paginate($number);
    } 

    public function show($id){
        return $this->userRepository->find($id);
    }

    public function store($request){
        return $this->userRepository->create($request);
    }

    public function update($request,$id){
        $model = $this->userRepository->find($id);
        return $model->update($request);
    }

    public function delete($id){
        $model = $this->userRepository->find($id);
        return $model->delete();
    }

    public function getUserByEmail($email){
        return $this->userRepository->getUserByEmail($email);
    }
}