<?php

namespace App\src\Services;


use App\src\Models\Order;
use App\src\Repositories\MasterRepository;
use App\src\Repositories\OrderRepository;
use App\src\Repositories\ServiceRepository;
use App\src\Repositories\SpareRepository;
use DateTime;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Object_;

class OrderService
{
    protected $serviceRepository;
    protected $orderRepository;
    protected $masterRepository;
    protected $spareRepository;
    protected $exportService;

    public function __construct(ServiceRepository $serviceRepository,
                                OrderRepository $orderRepository,
                                MasterRepository $masterRepository,
                                SpareRepository $spareRepository,
                                ExportService $exportService)
    {
        $this->serviceRepository = $serviceRepository;
        $this->orderRepository = $orderRepository;
        $this->masterRepository = $masterRepository;
        $this->spareRepository = $spareRepository;
        $this->exportService = $exportService;
    }

    /**
     * Рассчитать стоимость заказа
     */
    public function estimate($data)
    {
        $servicesCost = $this->calculateServicesCost($data->chosenServices);
        $mastersCost = $this->calculateMastersCost($data->chosenMasters);
        $sparesCost = $this->calculateSparesCost($data->chosenSpares);

        return $servicesCost + $mastersCost + $sparesCost;
    }

    public function saveAllOrdersInformation($data)
    {
        $orderId = $this->collectUserInformation($data);

        $this->storeOrderMasters($data->chosenMasters, $orderId);
        $this->storeOrderServices($data->chosenServices, $orderId);
        $this->storeOrderSpares($data->chosenSpares, $orderId);

        $this->orderRepository->changeName($orderId);

        return $orderId;
    }

    private function calculateServicesCost($chosenServices)
    {

        $servicesCost = 0;
        foreach ($chosenServices as $singleChosenService) {
            $serviceWithSpares = $this->serviceRepository->getByIdWithSpares($singleChosenService['id']);

            $sparesCost = 0;
            foreach ($serviceWithSpares['spares'] as $singleSpare) {
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
        $singleOrder->status = 'Создан';

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

            /* Вычислить кол-во неободимых запчастей и удалить их со склада */
            $this->minusSpareParts($singleChosenService);
        }
    }

    public function changeStatus($orderId)
    {
        $order = $this->orderRepository->getById($orderId);

        if ($order->status == 'Создан') {
            $order->status = 'Завершен';
        } else {
            $order->status = 'Создан';
        }

        $order->save();

        return $order->status;
    }

    /**
     * @param $singleChosenService
     * Отнять зап части со склада
     */
    private function minusSpareParts($singleChosenService)
    {
        $singleService = $this->serviceRepository->getByIdWithSpares($singleChosenService['id']);

        foreach ($singleService->spares as $singleSpare) {
            $singleSpare->quantity = $singleSpare->quantity - $singleSpare->service_quantity;
            $singleSpare->save();
        }

        return true;
    }

    public function exportToPdf($orderId)
    {
       return $this->exportService->exportToPdf($orderId);
    }

    private function storeOrderSpares($chosenSpares, $orderId)
    {
        foreach ($chosenSpares as $singleChosenSpare) {
            $this->spareRepository->bindSpareToOrder($singleChosenSpare, $orderId);
        }
    }

    private function calculateSparesCost($chosenSpares)
    {
        $sparesCost = 0;
        foreach ($chosenSpares as $singleChosenSpare) {
            $sparesCost = $sparesCost + (int)$singleChosenSpare['sparesForOrder'] * (int)$singleChosenSpare['cost'];
        }

        return $sparesCost;
    }

}