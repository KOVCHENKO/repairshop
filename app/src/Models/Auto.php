<?php

namespace App\src\Models;

use Illuminate\Database\Eloquent\Model;


class Auto extends Model
{
    protected $table = 'autos';

    protected $fillable = [
        'vin',
        'reg_number',
        'year',
        'volume',
        'transmission',
        'image'
    ];
}