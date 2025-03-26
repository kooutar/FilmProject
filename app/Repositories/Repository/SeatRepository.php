<?php

namespace App\Repositories\Repository;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfeces\SeatInterface;

class SeatRepository implements SeatInterface
{
    /**
     * Create a new class instance.
     */
   
   
     public function all()
{
   
    $seats = Seat::all();

   
    return response()->json(['seats' => $seats], 200);
}

public function findById($id)
{
   
    $seat = Seat::find($id);

  
    if (!$seat) {
        return response()->json(['message' => 'Siège non trouvé'], 404);
    }


    return response()->json(['seat' => $seat], 200);
}

public function create(array $data)
{
 
    $seat = Seat::create($data);

    
    return response()->json(['message' => 'Siège créé avec succès', 'seat' => $seat], 201);
}

     
public function update(array $data,$id)
{
   
    $seat = Seat::find($id);

   
    if (!$seat) {
        return response()->json(['message' => 'Siège non trouvé'], 404);
    }

    
    $seat->update($data);

   
    return response()->json(['message' => 'Siège mis à jour avec succès', 'seat' => $seat], 200);
}

public function delete($id)
{
 
    $seat = Seat::find($id);

   
    if (!$seat) {
        return response()->json(['message' => 'Siège non trouvé'], 404);
    }


    $seat->delete();

    return response()->json(['message' => 'Siège supprimé avec succès'], 200);
}


      public function updateReservation($idseat,$idreservation){
        $seat=$this->findById($idseat);
        $seat->id_reservation=$idreservation;
        $seat->save();
      }

      public function findSeatReservedByClient($idreservation){
        DB::table('seats')
            ->where('id_reservation', $idreservation)
            ->update(['id_reservation' => null]);
    }

}
