<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    //
    protected $table = "statistiks";
    public $timestamps = true;
    protected $fillable = [
        'keterangan', 'file'
    ];
}
