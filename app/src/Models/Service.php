<?php

namespace App\src\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App\src\Models
 * Услуги по ремонту автомобилей
 */
class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'vin',
        'reg_number',
        'year',
        'volume',
        'transmission',
        'image'
    ];
}