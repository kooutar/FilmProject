<?php

namespace App\Repositories;

use App\Models\Film;
use Illuminate\Support\Facades\DB;
use App\Repositories\FilmRepositoryInterface;

class FilmRespository implements FilmRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function all(){

    }
    public function findById($id){
       return Film::find($id); 
    }
    public function create(array $data){
      return  Film::create($data);
    }
    public function update(array $data, $id)
{
    $film = $this->findById($id);

    if ($film) {
        $film->update($data); // Call update on the instance, not statically
        return response()->json('Update successful');
    } else {
        return response()->json('Vous n\'êtes pas le créateur de ce film');
    }
}

    public function delete($id){

    }
}
