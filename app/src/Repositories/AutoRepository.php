<?php

namespace App\src\Repositories;


use App\src\Models\Auto;

class AutoRepository
{
    protected $auto;

    public function __construct(Auto $auto)
    {
        $this->auto = $auto;
    }

    public function getAll()
    {
        return $this->auto->all();
    }

    public function create($singleAuto)
    {
        $singleAuto['image'] = 'dummy';
        return $this->auto->create($singleAuto);
    }

    public function updateAuto($singleAuto)
    {
    }

    public function getById($id)
    {
        return $this->auto->find($id);
    }

    public function delete($id)
    {

    }


}