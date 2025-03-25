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
   
   
      public function all(){

      }
      public function findById($id){
       return Seat::find($id);
      }
      public function create(array $data){
        Seat::create($data);  
      }
     
      public function update(array $data){

      }
      public function delete($id){
          
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
