<?php

namespace App\src\Services;


use App\src\Repositories\ServiceRepository;
use App\src\Repositories\SpareRepository;

class SpareService
{
    protected $spareRepository;
    protected $serviceRepository;

    public function __construct(SpareRepository $spareRepository, ServiceRepository $serviceRepository)
    {
        $this->spareRepository = $spareRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function checkAvailabilityAtStore($serviceId)
    {
        $serviceWithSpares = $this->serviceRepository->getByIdWithSpares($serviceId);

        foreach ($serviceWithSpares->spares as $singleSpare) {
            if ((int)$singleSpare->quantity < (int)$singleSpare->service_quantity) {
                return false;
            }

            return true;
        }
    }
}