<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table='house';
    protected $primaryKey='id_house';
    protected $fillable=['id_user','name_house'];
    public function floor(){
        return $this->hasMany('App\Models\Floor','id_house');
    }
}
