<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    public function pemilik(){
		return $this->belongsTo('App\Pemilik','pemilik_id');
    }
}
