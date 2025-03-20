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
   public function registre(Request $request){
    $data=$request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required|string'
    ]);
    $user= $this->UserService->registreUser($data);
    return response()->json(['sussess'=>$user]);
   }
}
