<?php

namespace App\src\Repositories;


use App\src\Models\Service;

class ServiceRepository
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getAll()
    {
        return $this->service->all();
    }

    public function create($singleService)
    {
        return $this->service->create($singleService);

    }

    public function updateService($singleService)
    {
    }

    public function getById($id)
    {
        return $this->service->find($id);
    }

    public function delete($id)
    {
    }

    public function getByIdWithSpares($id)
    {
        return $this->service->with('spares')->where('id', $id)->first();
    }

}