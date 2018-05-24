<?php

namespace App\src\Repositories;


use App\src\Models\Auth\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserByLoginAndPassword($login, $password)
    {
        return $this->user->where([
            'login' => $login,
            'password' => $password
        ])->firstOrFail();
    }

    public function getAllAdmins()
    {
        return $this->user->where('role', '=', 'admin')->get();
    }

    public function createAdmin($singleAdmin)
    {
        return $this->user->create($singleAdmin);
    }

    public function updateUser($singleAdmin)
    {
        $user = $this->user->find($singleAdmin['id']);
        $user->name = $singleAdmin['name'];
        $user->login = $singleAdmin['login'];
        $user->password = $singleAdmin['password'];
        $user->save();

        return $this->user;
    }

    public function getById($id)
    {
        return $this->user->find($id);
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return $id;
    }

    public function getAllCustomers()
    {
        return $this->user->where('role', '=', 'customer')->get();
    }

    public function createCustomer($singleCustomer)
    {
        return $this->user->create($singleCustomer);
    }

    public function updateCustomer($singleCustomer)
    {
        $user = $this->user->find($singleCustomer['id']);
        $user->name = $singleCustomer['name'];
        $user->login = $singleCustomer['login'];
        $user->password = $singleCustomer['password'];
        $user->save();

        return $this->user;
    }
}