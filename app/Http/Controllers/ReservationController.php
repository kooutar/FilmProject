<?php

namespace App\Http\Controllers;

use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $ReservationService;
     public function __construct(ReservationService $ReservationService)
     {
        $this->ReservationService=$ReservationService;
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
       $data=$request->all();
       $data['id_client']=auth()->id();
       $this->ReservationService->AddReservationService($data);
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

    public function UpdatePaiment($id){
        return $this->ReservationService->updateStatusPaimentService($id);
    }
}
