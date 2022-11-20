<?php

namespace App\Listeners;

use App\Models\Topchart;
use App\Events\topchartCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class NewRowTopchartNotification
{
    /**
     * Handle the event.
     *
     * @param  topchartCreated  $event
     * @return void
     */
    public function handle(topchartCreated $event)
    {
        $idVote = $event->vote;

        Topchart::create(['id',
            'id_gamer' => Auth::user()->id,
            'voices' => '',
            'id_vote' => $idVote->id]);
        //        $event->vote
    }
}
