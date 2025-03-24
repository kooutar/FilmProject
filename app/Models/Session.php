<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $table="seance";
    protected $fillable = ['type', 'startTime', 'language', 'id_film']; // ✅ Ajoutez 'id_film'

}
