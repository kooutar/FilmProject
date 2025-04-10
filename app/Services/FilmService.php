<?php

namespace App\Services;

use App\Repositories\FilmRespository;

class FilmService
{
    /**
     * Create a new class instance.
     */
    private $FilmRespository;
    public function __construct(FilmRespository $FilmRespository)
    {
        //
        $this->FilmRespository=$FilmRespository;
    }

    public function AddFilmService($data){
        return $this->FilmRespository->create($data);
    }

    public function updateFilmService($data,$id){
        return $this->FilmRespository->update($data,$id);
    }

    public function deleteFilmService($id){
        return $this->FilmRespository->delete($id);
    }
    public function getAll(){
        return $this->FilmRespository->all();
    }
}
