<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelController extends Model
{
    protected $table = 'controller';
    protected $primaryKey = 'id_con';
    protected $fillable = [ 'id_user','id_per','id_devi', 'id_room','name_con'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'id_room');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function device()
    {
        return $this->belongsTo('App\Models\Device', 'id_devi');
    }
public function permission(){
        return $this->belongsTo('App\Models\Permission','id_per');
}
//    public function groupbymodule()
//    {
//        return $this->belongsTo('App\Models\Device', 'id_mod',groupBy(''));
//    }
}
