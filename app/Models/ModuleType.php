<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleType extends Model
{
    protected $table = 'module_type';
    protected $primaryKey = 'id';
    protected $fillable = ['name_mod_type', 'start_value', 'limit_value'];
    public $timestamps = false;
}
