<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public $incrementing = false; // lấy đc chuổi nếu không có chỉ lấy đc số trong chuổi

    protected $table = 'device';
    protected $primaryKey = 'id_devi';
    protected $fillable = ['id_stt', 'mac', 'id_devi_type', 'devi_value'];
    public $timestamps = false;

    public function device_type()
    {
        return $this->belongsTo('App\Models\DeviceType', 'id_devi_type');
    }
}
