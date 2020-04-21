<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='room';
    protected $primaryKey='id_room';
    protected $fillable=['id_floor','name_room'];
    public function floor(){
        return $this->belongsTo('App\Models\Floor','id_floor');
    }
}
