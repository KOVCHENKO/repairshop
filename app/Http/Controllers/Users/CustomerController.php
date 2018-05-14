<?php

namespace App\Http\Controllers\Users;

use App\src\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAllCustomers();
    }

    public function create(Request $request)
    {
        return $this->userRepository->createCustomer($request->singleCustomer);
    }

    public function update(Request $request)
    {
        return $this->userRepository->updateCustomer($request->singleCustomer);
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
