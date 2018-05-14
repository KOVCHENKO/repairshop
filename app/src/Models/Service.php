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
        'name',
        'description',
        'cost'
    ];

    public function spares()
    {
        return $this->belongsToMany(Spare::class, 'subsystems_authorities');
    }
}