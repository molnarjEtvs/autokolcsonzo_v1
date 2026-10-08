<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    public $table = "autok";
    public $primaryKey = "auto_id";
    public $timestamps = false;
    public $guarded = [];

    public function kategoria(){
        return $this->belongsTo(Kategoria::class,'kategoria_id','kategoria_id');
    }
}
