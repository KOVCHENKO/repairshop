<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\MasterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    protected $masterRepository;

    public function __construct(MasterRepository $masterRepository)
    {
        $this->masterRepository = $masterRepository;
    }

    public function getAll()
    {
        return $this->masterRepository->getAll();
    }

    public function create(Request $request)
    {
        $this->masterRepository->create($request->singleMaster);
    }

    public function update(Request $request)
    {
        return $this->masterRepository->updateMaster($request->singleMaster);
    }

    public function getById($id)
    {
        return $this->masterRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->masterRepository->delete($id);
    }
}
