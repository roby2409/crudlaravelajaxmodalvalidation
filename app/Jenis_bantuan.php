<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_bantuan extends Model
{
    //
    public function persentase(){
    	return $this->hasMany('App\Persentase');
    }
}
