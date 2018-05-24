<?php

namespace App\src\Models;


use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    protected $table = 'spares';

    protected $fillable = [
        'id',
        'name',
        'cost',
        'quantity',
        'unit'
    ];
}