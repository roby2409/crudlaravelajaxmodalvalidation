<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persentase extends Model
{
    protected $table = "persentase";

    protected $guarded = [];


    public function kabupaten()
    {
        return $this->belongsTo('App\Kabupaten');
    }

    public function jenis_bantuan()
    {
        return $this->belongsTo('App\Jenis_bantuan');
    }
}
