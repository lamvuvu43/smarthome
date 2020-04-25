<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    protected $table = 'device_type';
    protected $primaryKey = 'id_devi_type';
    protected $fillable = ['name_devi_type', 'min_value', 'max_value'];
    public $timestamps = false;
}
