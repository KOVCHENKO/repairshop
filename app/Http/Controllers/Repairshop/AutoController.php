<?php

namespace App\Http\Controllers\Repairshop;

use App\src\Repositories\AutoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $request->validate([
            'singleAuto.reg_number' => 'required',
            'singleAuto.year' => 'required',
            'singleAuto.volume' => 'required',
            'singleAuto.brand' => 'required',
        ]);


        $this->autoRepository->create($request->singleAuto);
    }

    public function update(Request $request)
    {
        $request->validate([
            'singleAuto.reg_number' => 'required',
            'singleAuto.year' => 'required',
            'singleAuto.volume' => 'required',
            'singleAuto.brand' => 'required',
        ]);


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

    public function uploadImage(Request $request)
    {
        $destinationPath = '/opt/lampp/htdocs/repairshop/public/images/autos';
        $extension = Input::file('file')->getClientOriginalExtension();
        $fileName = rand(111111,999999).'.'.$extension;
        Input::file('file')->move($destinationPath, $fileName);

        $img = Image::make($destinationPath.'/'.$fileName);
        $img->fit(150);

        Image::make($destinationPath.'/'.$fileName)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();})->save($destinationPath.'/'.$fileName);

        return [
            'result' => $destinationPath.'/'.$fileName,
            'fileName' => $fileName,
            'status' => 'success'
        ];
    }
}
