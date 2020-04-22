<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'user_permission';
    protected $primaryKey = 'id_per';
    protected $fillable = ['name_per', 'des_per'];
    public $timestamps = false;
}
