<?php

namespace App\Repositories;

use App\Models\Film;
use App\Repositories\FilmRepositoryInterface;

class FilmRespository implements FilmRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function all(){

    }
    public function findById($id){
        
    }
    public function create(array $data){
        Film::create($data);
    }
    public function update(array $data){

    }
    public function delete($id){

    }
}
