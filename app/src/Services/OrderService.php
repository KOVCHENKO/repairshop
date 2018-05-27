<?php

namespace App\src\Services;


use App\src\Models\Order;
use App\src\Repositories\MasterRepository;
use App\src\Repositories\OrderRepository;
use App\src\Repositories\ServiceRepository;
use DateTime;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Object_;

class OrderService
{
    protected $serviceRepository;
    protected $orderRepository;
    protected $masterRepository;

    public function __construct(ServiceRepository $serviceRepository,
                                OrderRepository $orderRepository,
                                MasterRepository $masterRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->orderRepository = $orderRepository;
        $this->masterRepository = $masterRepository;
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
        $orderId = $this->collectUserInformation($data);

        $this->storeOrderMasters($data->chosenMasters, $orderId);
        $this->storeOrderServices($data->chosenServices, $orderId);
        return $orderId;
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

    private function collectUserInformation($data)
    {
        $dt = new DateTime($data->singleOrder['completion_date']);
        $dt->format('Y-m-d');

        $singleOrder = new Order();
        $singleOrder->total_cost = $data->totalCost;
        $singleOrder->name = 'Заказ №1';
        $singleOrder->completion_date = $dt;
        $singleOrder->manager_id = Session::get('user_id');
        $singleOrder->customer_id = $data->chosenCustomer['id'];
        $singleOrder->auto_id = $data->chosenAuto['id'];

        return $this->orderRepository->create($singleOrder);

    }

    private function storeOrderMasters($chosenMasters, $orderId)
    {
        foreach ($chosenMasters as $singleChosenMaster) {
            $this->masterRepository->bindMasterToOrder($singleChosenMaster, $orderId);
        }

    }

    private function storeOrderServices($chosenServices, $orderId)
    {
        foreach ($chosenServices as $singleChosenService) {
            $this->serviceRepository->bindServiceToOrder($singleChosenService, $orderId);
        }
    }
}