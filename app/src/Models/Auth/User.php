<?php

namespace App\src\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id',
        'login',
        'name',
        'password',
        'role',
        'token',
    ];
}