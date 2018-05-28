<?php

namespace App\Http\Controllers\Users;

use App\src\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAllAdmins();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        return $this->userRepository->createAdmin($request->singleAdmin);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        return $this->userRepository->updateUser($request->singleAdmin);
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
