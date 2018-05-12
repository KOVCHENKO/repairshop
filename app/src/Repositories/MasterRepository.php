<?php

namespace App\src\Repositories;


use App\src\Models\Master;

class MasterRepository
{
    protected $master;

    public function __construct(Master $master)
    {
        $this->master = $master;
    }

    public function getAll()
    {
        return $this->master->all();
    }

    public function create($data)
    {
        return $this->master->create($data);
    }

    public function updateMaster($singleMaster)
    {
        $user = $this->master->find($singleMaster['id']);
        $user->name = $singleMaster['name'];
        $user->position = $singleMaster['position'];
        $user->rate= $singleMaster['rate'];
        $user->save();

        return $this->master;
    }

    public function getById($id)
    {
        return $this->master->find($id);
    }

    public function delete($id)
    {
        $master = $this->master->find($id);
        $master->delete();

        return $id;
    }


}