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
}
