<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    public function kendaraan(){
		return $this->belongsTo('App\Kendaraan','kendaraan_id');
    }
}
