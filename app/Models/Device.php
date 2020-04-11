<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table='device';
    protected $primaryKey='id';
    protected $fillable=['id_dev_type','name_device'];
}
