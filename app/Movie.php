<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //een relatie tussen film en reservering.
    public function reservation(){
        return $this->hasMany('App\Reservation');
    }

    //deze velden moeten ingevuld zijn.
    protected $fillable = ['movieName', 'description', 'price'];
}
