<?php

namespace App\Repositories\Repository;
use App\Models\Reservation;
use App\Repositories\Interfeces\ReservationInterface;
use Illuminate\Support\Facades\DB;

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
        $seat=$this->SeatReposotory->findById($data['id_seat']);
      
        $this->SeatReposotory->updateReservation($seat->id,  $reservation_id);
     }

     public function update(array $data){

     }
     public function delete($id){}
     public function updateStatusPaiment($idReservation)
     {
    DB::table('_reservation')
        ->where('id', $idReservation)
        ->update([
            'status' => 'paid',  // Nouvelle valeur
            'updated_at' => now()  // Mise à jour du timestamp
        ]);

    return response()->json(['message' => 'Statut de paiement mis à jour avec succès']);
  }

}
