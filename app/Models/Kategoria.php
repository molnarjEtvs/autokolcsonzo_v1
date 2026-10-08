<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    public $table = "kategoriak";
    public $primaryKey = "kategoria_id";
    public $timestamps = false;
    public $guarded = [];

    public function autok(){
        return $this->hasMany(Auto::class,"kategoria_id","kategoria_id");
    }
}
