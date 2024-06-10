<?php
namespace V1\Base\Repositories;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all();   
    public function paginate($number);   
    public function find($id): ? Model;
    public function create(array $data): ? Model;
    public function update(array $data,$id): ? Model;
    public function delete($id): bool;
}