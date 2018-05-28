<?php

namespace App\src\Models;

use App\src\Models\Auth\User;
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
        'auto_id',
        'total_cost',
        'status'
    ];

    public function auto()
    {
        return $this->hasOne(Auto::class, 'id', 'auto_id');
    }

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function masters()
    {
        return $this->belongsToMany(Master::class, 'orders_masters')->withPivot('labor_hours');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'orders_services');
    }
}