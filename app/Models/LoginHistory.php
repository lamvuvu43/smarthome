<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $table='login_history';
    protected $primaryKey='id_log_his';
    protected $fillable=['id_user','log_time','device_login'];
    public $timestamps = false;
}
