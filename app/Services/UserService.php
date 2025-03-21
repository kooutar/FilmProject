<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Create a new class instance.
     */
    protected $UserRepository;
    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository=$UserRepository;
    }

    public function registreUser($data){
        $data['password']=Hash::make($data['password']);
        return $this->UserRepository->create($data);
    }

    public function login($data)
    {
        return $this->UserRepository->login($data);
    }

}
