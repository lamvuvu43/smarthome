<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    protected $table='device_type';
    protected $primaryKey='id';
    protected $fillable=['name_devi_type'];
}
