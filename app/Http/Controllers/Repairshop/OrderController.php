<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\MasterRepository;
use App\src\Repositories\OrderRepository;
use App\src\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @property  orderService
 */
class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderService;

    public function __construct(OrderRepository $orderRepository, OrderService $orderService)
    {
        $this->orderRepository= $orderRepository;
        $this->orderService = $orderService;
    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function create(Request $request)
    {
        $this->orderService->saveAllOrdersInformation($request);
    }

    public function update(Request $request)
    {
        return $this->orderRepository->updateOrder($request->singleOrder);
    }

    public function getById($id)
    {
        return $this->orderRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->orderRepository->delete($id);
    }

    public function estimate(Request $request)
    {
        return $this->orderService->estimate($request);
    }

    public function changeStatus($orderId)
    {
        return $this->orderService->changeStatus($orderId);
    }
}
