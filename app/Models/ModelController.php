<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelController extends Model
{
    protected $table = 'controller';
    protected $primaryKey = 'id';
    protected $fillable = ['id_mod', 'id_room', 'id_per', 'id_user', 'name_con'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'id_room');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function module()
    {
        return $this->belongsTo('App\Models\Module', 'id_mod');
    }

    public function groupbymodule()
    {
        return $this->belongsTo('App\Models\Module', 'id_mod',groupBy(''));
    }
}
