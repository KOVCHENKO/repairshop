<?php

namespace App\src\Repositories;


use App\src\Models\Order;

class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getAll()
    {
        return '';
    }

    public function create($singleOrder)
    {
        $singleOrder->save();
        return $singleOrder->id;
    }

    public function updateOrder($singleOrder, $totalCost)
    {


        return '';
    }

    public function getById($id)
    {
        return '';
    }

    public function delete($id)
    {
        return '';
    }
}