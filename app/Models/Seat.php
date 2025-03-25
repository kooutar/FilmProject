<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
   protected $fillable =['numero','id_Reservation','id_salle'];
}
