<?php

namespace App\Repositories\Repository;

use App\Models\Session;
use App\Repositories\Interfeces\SessionInterface;

class SessionRepository implements SessionInterface
{
    /**
     * Create a new class instance.
     */
   

    public function all(){

    }
    public function findById($id){

    }
    public function create(array $data){
      Session::create($data);  
    }
    public function update(array $data){

    }
    public function delete($id){

    }
}
