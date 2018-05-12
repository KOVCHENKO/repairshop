<?php

namespace App\src\Repositories;


use App\src\Models\Spare;

class SpareRepository
{
    protected $spare;

    public function __construct(Spare $spare)
    {
        $this->spare = $spare;
    }

    public function getAll()
    {
        return $this->spare->all();
    }

    public function create($singleSpare)
    {
        return $this->spare->create($singleSpare);
    }

    public function updateMaster($singleSpare)
    {
        $user = $this->spare->find($singleSpare['id']);
        $user->name = $singleSpare['name'];
        $user->cost = $singleSpare['cost'];
        $user->quantity = $singleSpare['quantity'];
        $user->save();

        return $this->spare;
    }

    public function getById($id)
    {
        return $this->spare->find($id);
    }

    public function delete($id)
    {
        $spare = $this->spare->find($id);
        $spare->delete();

        return $id;
    }
}