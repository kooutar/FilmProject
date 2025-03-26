<?php

namespace App\Repositories;

use App\Models\Film;
use App\Repositories\FilmRepositoryInterface;

class FilmRespository implements FilmRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function all()
    {
        
        $Films = Film::all();
    
        
        return response()->json(['Films' => $Films], 200);
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
    $film=$this->findById($id);
    if($film){
        return $film->delete();
        
    }
    }
}
