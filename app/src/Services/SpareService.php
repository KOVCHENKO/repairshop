<?php

namespace App\src\Services;


use App\src\Repositories\ServiceRepository;
use App\src\Repositories\SpareRepository;
use Illuminate\Support\Facades\Session;

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

        /* Услуги с нулевым необходимым кол-вом запчасей на складе */
        if($serviceWithSpares->spares->isEmpty()) {
            return true;
        }

        foreach ($serviceWithSpares->spares as $singleSpare) {

            if ((int)$singleSpare->quantity < (int)$singleSpare->service_quantity) {
                return false;
            } else {
                /**
                 * Для того, чтобы затем выбрать необходимое кол-во
                 * отдельных материалов для заказа - нужно положить в сессию
                 */
                $this->keepUsedSparesForOrder($singleSpare);
            }
        }

        return true;
    }

    private function keepUsedSparesForOrder($singleSpare)
    {
        $sparesInOrder = Session::get('sparesInOrder');
        array_push($sparesInOrder, $singleSpare);
        Session::put('sparesInOrder', $sparesInOrder);
    }

    public function checkIfSingleAvailableAtStore($spareId, $quantityForOrder)
    {
        $spare = $this->spareRepository->getById($spareId);

        $sparesInOrder = Session::get('sparesInOrder');
        foreach ($sparesInOrder as $singleSpare) {
            if($singleSpare->id == $spare->id) {
                $spare->quantity = $spare->quantity - $singleSpare->service_quantity;
            }

        }



        if ((int)$spare->quantity < (int)$quantityForOrder) {
            return false;
        }

        return true;
    }
}