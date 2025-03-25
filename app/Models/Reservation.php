<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table="_reservation";
    protected $fillable=['id_cleint','id_seance','montant','status'];
}
