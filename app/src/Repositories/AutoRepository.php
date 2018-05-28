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
        return $this->auto->create($singleAuto);
    }

    public function updateAuto($singleAuto)
    {
        $auto = $this->auto->find($singleAuto['id']);
        $auto->reg_number = $singleAuto['reg_number'];
        $auto->year = $singleAuto['year'];
        $auto->volume = $singleAuto['volume'];
        $auto->transmission = $singleAuto['transmission'];
        $auto->image = $singleAuto['image'];
        $auto->brand = $singleAuto['brand'];
        $auto->save();

        return $this->auto;
    }

    public function getById($id)
    {
        return $this->auto->find($id);
    }

    public function delete($id)
    {
        $auto = $this->auto->find($id);
        $auto->delete();

        return $id;
    }


}