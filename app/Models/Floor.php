<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Floor extends Model
{
    protected $table='floor';
    protected $primaryKey='id_floor';
    protected $fillable=['id_house','name_floor'];
    public function room(){
        return $this->hasMany('App\Models\Room','id_floor');
    }
    public function house(){
        return $this->belongsTo('App\Models\House','id_house');
    }
    public $timestamps = false;
}
