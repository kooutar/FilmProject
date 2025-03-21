<?php

namespace App\Services;

use App\Repositories\Repository\SessionRepository;

class SessionService
{
    /**
     * Create a new class instance.
     */
    private $SessionRepository;
    public function __construct(SessionRepository $SessionRepository){
        $this->SessionRepository=$SessionRepository;
    }

     public function AddSessionService($data){
      return $this->SessionRepository->create($data);
    }

    


}
