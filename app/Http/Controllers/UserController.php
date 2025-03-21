<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
     private $UserService;
     public function __construct(UserService $UserService)
     {
       $this->UserService=$UserService;
     }

   public function store(Request $request){
    $data=$request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);
    $user= $this->UserService->registreUser($data);
    return response()->json(['sussess'=>$user]);
   }

   public function login(Request $request)
    {
      $data=$request->validate([
        
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:6',
    ]);
        return $this->UserService->login($data);
    }
}
