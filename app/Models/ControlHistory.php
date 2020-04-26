<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlHistory extends Model
{
    protected $table='control_history';
    protected $primaryKey='id_con_his';
    protected $fillable=['id_con','con_time','value_input'];
}
