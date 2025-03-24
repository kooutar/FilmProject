<?php

namespace App\Services;

use App\Repositories\Repository\ReservationRepository;

class ReservationService
{
    /**
     * Create a new class instance.
     */
    protected $ReservationRepository;
    public function __construct(ReservationRepository $ReservationRepository)
    {
       $this->ReservationRepository=$ReservationRepository;
    }

    public function AddReservationService(array $data)  {
        return $this->ReservationRepository->create($data);
    }
}
