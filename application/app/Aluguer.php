<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluguer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id','campo', 'date', 'hora','price','ref',
    ];
    //
    public function user(){

        return $this->belongsTo('App\User');
    }


}
