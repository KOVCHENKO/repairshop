<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\AutoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoController extends Controller
{
    protected $autoRepository;

    public function __construct(AutoRepository $autoRepository)
    {
        $this->autoRepository= $autoRepository;
    }

    public function getAll()
    {
        return $this->autoRepository->getAll();
    }

    public function create(Request $request)
    {
        $this->autoRepository->create($request->singleAuto);
    }

    public function update(Request $request)
    {
        return $this->autoRepository->updateAuto($request->singleAuto);
    }

    public function getById($id)
    {
        return $this->autoRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->autoRepository->delete($id);
    }
}
