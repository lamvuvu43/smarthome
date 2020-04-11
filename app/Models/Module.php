<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table='module';
    protected $primaryKey='id';
    protected $fillable=['id_stt','id_mod_type','mac','name_mod','value'];
}
