<?php

namespace App\Repositories\Repository;

use App\Models\Salle;
use App\Repositories\Interfeces\SalleInterface;

class SalleRepository implements SalleInterface
{
    /**
     * Create a new class instance.
     */
    public function all()
    {
        
        $salles = Salle::all();
    
        
        return response()->json(['salles' => $salles], 200);
    }
    
    public function findById($id)
    {
       
        $salle = Salle::find($id);
    
       
        if (!$salle) {
            return response()->json(['message' => 'Salle non trouvée'], 404);
        }
        return response()->json(['salle' => $salle], 200);
    }
    
    public function create(array $data){
      Salle::create($data);  
    }
    public function update(array $data,$id)
    {
        
        $salle = Salle::find($id);
    
       
        if (!$salle) {
            return response()->json(['message' => 'Salle non trouvée'], 404);
        }
    
      
        $salle->update($data);
    
       
        return response()->json(['message' => 'Salle mise à jour avec succès', 'salle' => $salle], 200);
    }
    
    public function delete($id)
{
    $salle = Salle::find($id);

    if (!$salle) {
        return response()->json(['message' => 'Salle non trouvée'], 404);
    }

   
    $salle->delete();

   
    return response()->json(['message' => 'Salle supprimée avec succès'], 200);
}

}
