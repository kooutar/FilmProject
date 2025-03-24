<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionService;


class SessionController extends Controller
{
    //
  private $SessionService;
  public function __construct(SessionService $SessionService)
  {
     $this->SessionService=$SessionService;
  } 

  public function store(Request $request){
     $data =$request->validate(
        [
        'type' => 'required|in:VIP,Normale', // Doit être soit 'VIP' soit 'Normale'
        'startTime' => 'required|date_format:H:i', // Doit être un format d'heure valide (HH:MM)
        'language' => 'required|string|max:50', // Langue obligatoire, max 50 caractères
        'id_film' => 'required|integer|exists:films,id' // ✅ Vérifie que le film existe
        ]
        );
      //   dd($request->all());
       $session= $this->SessionService->AddSessionService($data);
        return response()->json(['susses'=>$session]);
  }
  public function update(Request $request, string $id)
  {
   
      $session=$this->SessionService->updateSessionService($request->all(),$id);
      return response()->json(['susses'=>$session]);
  }

  public function destroy($id){
  $this->SessionService->deleteSessinService($id);
  return response()->json('delete with success');
  }

}
