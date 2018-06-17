<?php

namespace App\src\Services\Auth;


use App\src\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;

class LoginService
{
    protected $userRpository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($data)
    {
        if($this->checkIfLoginAsSuperAdmin($data->login, $data->password)) {
            return ['role' => 'superadmin'];
        }

        try {
            $user = $this->userRepository->getUserByLoginAndPassword($data->login, $data->password);
        } catch (\Exception $ex){
            return response($ex->getMessage(),404);
        }

        $this->generateToken($user);

        Session::put('user_id', $user->id);
        /* Работа с запчастями заказа */
        $sparesInOrder = array();
        Session::put('sparesInOrder', $sparesInOrder);

        return [
            'role' => $user->role
        ];

    }

    protected function checkIfLoginAsSuperAdmin($login, $password)
    {
        if($login == 'superadmin' && $password == 'superadmin') {
            return true;
        }

        return false;
    }

    protected function generateToken($user)
    {
        $user->token = sha1(uniqid());
        Session::put('token', $user->token);
        $user->save();

        return true;
    }

}