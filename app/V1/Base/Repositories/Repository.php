<?php
namespace V1\Base\Repositories;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    private Model $model;

    public function set(Model $model) : void{
        $this->model = $model;
    }

    public function get(){
        return $this->model;
    }

    public function all(){
        return $this->model->latest()->get();
    }

    public function paginate($number){
        return $this->model->orderBy('id','DESC')->paginate($number);
    }

    public function find($id): ? Model{
        return $this->model->find($id);
    }

    public function create(array $data): ? Model{
        return $this->model->create($data);
    }

    public function update(array $data,$id): ? Model{
        $model = $this->model->find($id);
        return $model->update($data);
    }

    public function delete($id): bool{
        $model = $this->model->find($id);
        return $model->delete();
    }
}