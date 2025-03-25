<?php

namespace App\Jobs;

use App\Models\Reservation;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class expeirdResevation implements ShouldQueue
{
    use Queueable;

  
    public function __construct()
    {
       
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $reservations = Reservation::where('status', 'pending')
                               ->where('created_at', '<=', Carbon::now()->subMinutes(15))
                               ->get();

    foreach ($reservations as $reservation) {
        $reservation->update(['status' => 'expired']);
    }
    }
}
