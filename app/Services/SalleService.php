<?php

namespace App\Services;

use App\Repositories\Repository\SalleRepository;

class SalleService
{
    /**
     * Create a new class instance.
     */
    private $SalleRepository;
    public function __construct(SalleRepository $SalleRepository)
    {
        //
        $this->SalleRepository=$SalleRepository;
    }

    public function AddSalleService($data){
       return $this->SalleRepository->create($data);
    }
}
