<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table= 'users';
    protected $primaryKey='id';
    protected $fillable = [
        'username', 'password', 'phone','email','address','role_id'
    ];
}
