<?php

namespace App\Http\Controllers;

use App\Services\SalleService;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $SalleService;
    public function __construct(SalleService $SalleService)
    {
        $this->SalleService=$SalleService;
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
        //
        $validatedData = $request->validate([
            'numero' => 'required|integer|unique:salles,numero', // Le numéro de la salle est obligatoire et doit être unique
            'nbrPlaces' => 'required|integer|min:1', // Le nombre de places doit être un entier et au moins 1
        ]);

        $salle=$this->SalleService->AddSalleService($validatedData);
        return response()->json(['sussus'=>$salle]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
