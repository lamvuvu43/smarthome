<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'role_id', 'address', 'password'
    ];
}
