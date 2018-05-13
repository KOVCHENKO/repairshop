<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\MasterRepository;
use App\src\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository= $orderRepository;
    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function create(Request $request)
    {
        $this->orderRepository->create($request->singleOrder);
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
}
