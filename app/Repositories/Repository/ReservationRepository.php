<?php

namespace App\Repositories\Repository;
use App\Models\Reservation;
use App\Jobs\expeirdResevation;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfeces\ReservationInterface;

class ReservationRepository implements ReservationInterface
{
    /**
     * Create a new class instance.
     */
    protected $SeatReposotory;
    public function __construct(SeatRepository $SeatReposotory)
    {
        $this->SeatReposotory=$SeatReposotory;
    }

     public function all(){
       return Reservation::all();
     }
     public function findById($id){
        return Reservation::find($id);
     }

     

     public function create($data){
        
        $reservation_id= DB::table('_reservation')->insertGetId([
           'id_client'=>auth()->id(),
           'id_seance'=>$data['id_seance'],
           'montant'=>$data['montant'],
           'created_at' => now(),
           'updated_at' => now(),
        ]);
        $reservation=$this->findById($reservation_id);
        expeirdResevation::dispatch($reservation)->delay(now()->addMinutes(15));
        $seat=$this->SeatReposotory->findById($data['id_seat']);
      
        $this->SeatReposotory->updateReservation($seat->id,  $reservation_id);
     }

     public function update(array $data, $id)
     {
         // Rechercher la réservation par ID
         $reservation = DB::table('_reservation')->where('id', $id)->first();
     
         // Vérifier si la réservation existe
         if (!$reservation) {
             return response()->json(['message' => 'Réservation non trouvée'], 404);
         }
     
         // Mettre à jour la réservation
         DB::table('_reservation')->where('id', $id)->update($data);
     
         // Renvoyer la réponse JSON avec le statut de mise à jour
         return response()->json(['message' => 'Réservation mise à jour avec succès'], 200);
     }
     
     public function delete($id){
        $this->SeatReposotory->findSeatReservedByClient($id);
        $reservation =$this->findById($id);
        return $reservation->delete();
    
     }
     public function updateStatusPaiment($idReservation)
     {
    DB::table('_reservation')
        ->where('id', $idReservation)
        ->update([
            'status' => 'paid', 
            'updated_at' => now()  
        ]);
    
        $reservations = DB::table('users')
        ->join('_reservation', '_reservation.id_client', '=', 'users.id')
        ->join('seance', '_reservation.id_seance', '=', 'seance.id')
        ->join('films', 'seance.id_film', '=', 'films.id')
        ->join('salles', 'salles.id', '=', 'seance.id_salle') // D'abord lier la salle à la séance
        ->join('seats', 'seats.id_salle', '=', 'salles.id') // Ensuite ajouter les sièges
        ->get();
        if ($reservations->isEmpty()) {
            return response()->json(['message' => 'Aucune réservation trouvée'], 404);
        }
        return response()->json(['reservations' => $reservations], 200);
        
       

  }

}
