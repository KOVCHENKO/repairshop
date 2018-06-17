<?php

namespace App\src\Repositories;


use App\src\Models\Master;
use Illuminate\Support\Facades\DB;

class MasterRepository
{
    protected $master;

    public function __construct(Master $master)
    {
        $this->master = $master;
    }

    public function getAll()
    {
        return $this->master->all();
    }

    public function create($data)
    {
        return $this->master->create($data);
    }

    public function updateMaster($singleMaster)
    {
        $user = $this->master->find($singleMaster['id']);
        $user->name = $singleMaster['name'];
        $user->position = $singleMaster['position'];
        $user->rate= $singleMaster['rate'];
        $user->save();

        return $this->master;
    }

    public function getById($id)
    {
        return $this->master->find($id);
    }

    public function delete($id)
    {
        $master = $this->master->find($id);
        $master->delete();

        return $id;
    }

    public function bindMasterToOrder($singleChosenMaster, $orderId)
    {
        DB::table('orders_masters')->insert([
            'order_id' => $orderId,
            'master_id' => $singleChosenMaster['id'],
            'labor_hours' => $singleChosenMaster['laborHours']
        ]);

        return true;
    }

    public function estimateHours($data)
    {
        return DB::table('orders_masters')
            ->join('orders', 'orders.id', '=', 'orders_masters.order_id')
            ->where('orders_masters.master_id', $data['master']['id'])
            ->where('orders.created_at', '>', $data['from'])
            ->where('orders.created_at', '<', $data['to'])
            ->get();
    }


}