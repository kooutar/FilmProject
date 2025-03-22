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
     return Session::find($id);
    }
    public function create(array $data){
      Session::create($data);  
    }

    public function update(array $data,$id){
      $session=$this->findById($id);
      if($session){
        return $session->update($data);
      }
    }
    
    public function delete($id){
      $session=$this->findById($id);
      if($session){
        return $session->delete($id);
      }
    }
}
