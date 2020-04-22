<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOfProduct extends Model
{
    protected $table='detail_of_product';
    protected $fillable=['mac','id_dev','id_stt','name_house'];
    public function device(){
        return $this->belongsTo('App\Models\Device','id_dev');
    }
    public function status(){
        return $this->belongsTo('App\Models\Status','id_stt');
    }
    public $timestamps = false;

}
