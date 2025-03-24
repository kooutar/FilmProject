<?php

namespace App\Repositories\Repository;
use App\Models\Seat;
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

}
