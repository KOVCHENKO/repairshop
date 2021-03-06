<?php

namespace App\src\Repositories;


use App\src\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getAll()
    {
        return $this->order
            ->with('auto')
            ->with('customer')
            ->where('manager_id', Session::get('user_id'))
            ->get();
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
        return $this->order->where('id', $id)
            ->with('auto')
            ->with('customer')
            ->with('masters')
            ->with('services')
            ->with('spares')
            ->first();

    }

    public function delete($id)
    {
        /* Удалить из orders_masters*/
        DB::table('orders_masters')->where('order_id', $id)->delete();

        /* Удалить из orders_services */
        DB::table('orders_services')->where('order_id', $id)->delete();

        $order = $this->order->find($id);

        $order->delete();

        return $id;
    }

    public function changeName($orderId)
    {
        $order = $this->order->find($orderId);
        $order->name = 'Заказ №'.$orderId;
        $order->save();

        return true;
    }

    public function getAllCustomer()
    {
        return $this->order
            ->with('auto')
            ->with('customer')
            ->where('customer_id', Session::get('user_id'))
            ->get();
    }

    public function getAllSuper()
    {
        return $this->order
            ->with('auto')
            ->with('customer')
            ->get();
    }
}