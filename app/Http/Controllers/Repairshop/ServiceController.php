<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getAll()
    {
        return $this->serviceRepository->getAll();
    }

    public function create(Request $request)
    {
        $this->serviceRepository->create($request->singleService);
    }

    public function update(Request $request)
    {
        return $this->serviceRepository->updateService($request->singleService);
    }

    public function getById($id)
    {
        return $this->serviceRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->serviceRepository->delete($id);
    }
}
