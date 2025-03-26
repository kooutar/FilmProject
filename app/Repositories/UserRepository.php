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

    public function update(array $data, $id)
{
    // Recherche l'utilisateur avec l'ID passé
    $user = User::find($id);

    // Si l'utilisateur n'existe pas, retourne une erreur
    if (!$user) {
        return response()->json(['message' => 'Utilisateur non trouvé'], 404);
    }

    // Met à jour l'utilisateur avec les données envoyées
    $user->update($data);

    // Retourne une réponse JSON avec un message de succès et les données de l'utilisateur mis à jour
    return response()->json(['message' => 'Utilisateur mis à jour avec succès', 'user' => $user], 200);
}
public function logout($request)
{
    // Déconnecte l'utilisateur
    Auth::logout();

    // Supprime la session
    $request->session()->invalidate();

    // Régénère l'ID de session pour la sécurité
    $request->session()->regenerateToken();

    // Retourne une réponse JSON ou redirige l'utilisateur
    return response()->json(['message' => 'Utilisateur déconnecté avec succès'], 200);
}

}
