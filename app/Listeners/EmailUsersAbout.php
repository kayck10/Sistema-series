<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailUsersAbout implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
       //código omitido

       public function handle(EventsSeriesCreated $event)
        {
                $userList = User::all();
            foreach ($userList as $index => $user) {
                $email = new SeriesCreated(
                    $event->seriesName,
                    $event->seriesId,
                    $event->seriesSeasonsQty,
                    $event->seriesEpisodesPerSeason,
                );
                $when = now()->addSeconds($index * 5);
                Mail::to($user)->later($when, $email);
            }
      }
}
