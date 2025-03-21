<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $fillable=[
        'titre','description','image','duree','ageMin','genre','trailer','id_admin'
    ];
}
