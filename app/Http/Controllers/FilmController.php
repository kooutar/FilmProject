<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FilmService;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $FilmService;
    public function __construct(FilmService $FilmService)
    {
        $this->FilmService=$FilmService;
    }
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate(
            [
                'titre' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'required', // Image obligatoire, format et taille max 2MB
                'duree' => 'required|integer|min:1', // Durée en minutes, minimum 1 minute
                'ageMin' => 'required|integer|min:0|max:100', // Age minimum entre 0 et 100
                'genre' => 'required|string|max:100',
                'trailer' => 'required|url', // Lien vers la bande-annonce
                'id_admin' => 'required|exists:users,id', // Vérifie que l'admin existe
            ]
        );
        if($this->FilmService->AddFilmService($data)){
          $Film=$this->FilmService->AddFilmService($data);
         return response()->json(['susses'=>$Film]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Film=$this->FilmService->updateFilmService($request->all(),$id);
        return response()->json(['susses'=>$Film]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->FilmService->deleteFilmService($id);
        return response()->json('delete with succes');
    }
}
