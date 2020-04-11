<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HisLog extends Model
{
    protected $table='his_log';
//    protected $primaryKey='1';
    protected $fillable=['id_user','log_time','device'];
}
