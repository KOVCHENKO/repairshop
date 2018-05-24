<?php

namespace App\src\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id',
        'name',
        'completion_date',
        'manager_id',
        'customer_id',
        'auto_id'
    ];
}