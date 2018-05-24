<?php

namespace App\src\Services;


use App\src\Repositories\ServiceRepository;

class OrderService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Рассчитать стоимость заказа
     */
    public function estimate($data)
    {
        $servicesCost = $this->calculateServicesCost($data->chosenServices);
        $mastersCost = $this->calculateMastersCost($data->chosenMasters);

        return $servicesCost + $mastersCost;
    }

    public function saveAllOrdersInformation($data)
    {

    }

    private function calculateServicesCost($chosenServices)
    {

        $servicesCost = 0;
        foreach ($chosenServices as $singleChosenService) {
            $serviceWithSpares = $this->serviceRepository->getByIdWithSpares($singleChosenService['id']);

            $sparesCost = 0;
            foreach($serviceWithSpares['spares'] as $singleSpare) {
                $sparesCost = $sparesCost + (int)$singleSpare->cost * (int)$singleSpare->service_quantity;
            }

            $servicesCost = $servicesCost + $sparesCost + $singleChosenService['cost'];
        }

        return $servicesCost;
    }

    private function calculateMastersCost($chosenMasters)
    {
        $mastersCost = 0;
        foreach ($chosenMasters as $singleChosenMaster) {
            $mastersCost = $mastersCost + (int)$singleChosenMaster['laborHours'] * (int)$singleChosenMaster['rate'];
        }

        return $mastersCost;
    }
}