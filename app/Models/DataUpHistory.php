<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUpHistory extends Model
{
    protected $table='dataup_history';
    protected $primaryKey='id_up';
    protected $fillable=['id_devi','dt_up','value_up'];
}
