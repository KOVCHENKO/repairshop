<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\SpareRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpareController extends Controller
{
    protected $spareRepository;

    public function __construct(SpareRepository $spareRepository)
    {
        $this->spareRepository = $spareRepository;
    }

    public function getAll()
    {
        return $this->spareRepository->getAll();
    }

    public function create(Request $request)
    {
        $this->spareRepository->create($request->singleSpare);
    }

    public function update(Request $request)
    {
        return $this->spareRepository->updateMaster($request->singleSpare);
    }

    public function getById($id)
    {
        return $this->spareRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->spareRepository->delete($id);
    }

    public function addSpareToService($spareId, $serviceId, $quantity)
    {
        $result = $this->spareRepository->addSpareToService($spareId, $serviceId, $quantity);

        return [
            'result' => $result
        ];
    }

    public function getSparesOfService($serviceId)
    {
        return $this->spareRepository->getSparesOfService($serviceId);
    }

    public function deleteSparesFromService($spareServiceId)
    {
        return $this->spareRepository->deleteSparesFromService($spareServiceId);
    }
}
