<?php

namespace App\src\Repositories;


use App\src\Models\Spare;
use Illuminate\Support\Facades\DB;

class SpareRepository
{
    protected $spare;

    public function __construct(Spare $spare)
    {
        $this->spare = $spare;
    }

    public function getAll()
    {
        return $this->spare->all();
    }

    public function create($singleSpare)
    {
        return $this->spare->create($singleSpare);
    }

    public function updateMaster($singleSpare)
    {
        $user = $this->spare->find($singleSpare['id']);
        $user->name = $singleSpare['name'];
        $user->cost = $singleSpare['cost'];
        $user->quantity = $singleSpare['quantity'];
        $user->save();

        return $this->spare;
    }

    public function getById($id)
    {
        return $this->spare->find($id);
    }

    public function delete($id)
    {
        $spare = $this->spare->find($id);
        $spare->delete();

        return $id;
    }

    public function addSpareToService($spareId, $serviceId, $quantity)
    {
        return DB::table('services_spares')->insert([
            'spare_id' => $spareId,
            'service_id' => $serviceId,
            'quantity' => $quantity
        ]);
    }

    public function getSparesOfService($serviceId)
    {
        return DB::table('services_spares')
            ->join('spares', 'services_spares.spare_id', '=', 'spares.id')
            ->select('spares.name', 'services_spares.quantity', 'services_spares.id', 'spares.unit')
            ->where('services_spares.service_id', $serviceId)
            ->get();
    }

    public function deleteSparesFromService($spareServiceId)
    {
        return DB::table('services_spares')->where('id', $spareServiceId)->delete();
    }
}