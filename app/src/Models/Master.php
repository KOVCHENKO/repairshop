<?php

namespace App\src\Models;

use Illuminate\Database\Eloquent\Model;


class Master extends Model
{
    protected $table = 'masters';

    protected $fillable = [
        'id',
        'name',
        'position',
        'rate'
    ];
}