<?php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all();
    public function findById($id);
    public function create(array $data);
    public function login(array $data);
    public function update(array $data ,$id);
   public  function  logout($data);
}
