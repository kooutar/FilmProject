<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    
    public function all()
    {
        return User::all();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
      
        return User::create($data);
    }

    public function login( array $data){
        $credentials = ['email' => $data['email'], 'password' => $data['password']];
  
    if (!$token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => 'Non autorisé'], 401);
    }
      
    return response()->json([
        'token' => $token,
        'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);

    }
}
