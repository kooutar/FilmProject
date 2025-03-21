<?php

namespace App\Repositories\Repository;

use App\Models\Salle;
use App\Repositories\Interfeces\SalleInterface;

class SalleRepository implements SalleInterface
{
    /**
     * Create a new class instance.
     */
    public function all(){

    }
    public function findById($id){

    }
    public function create(array $data){
      Salle::create($data);  
    }
    public function update(array $data){

    }
    public function delete($id){

    }
}
