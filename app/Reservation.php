<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //relatie tussen reservering en film.
    public function movie(){
        return $this->belongsTo('App\Movie');
    }

    //relatie tussen reservering en gebruiker.
    public function user(){
        return $this->belongsTo('App\User');
    }

    //deze velden moeten ingevuld zijn.
    protected $fillable = ['time', 'amount'];
}
