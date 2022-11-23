<?php

namespace App\Listeners;

use App\Models\TopChart;
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

        TopChart::create(['id',
            'id_gamer' => auth()->user()->id,
            'voices' => 0,
            'id_vote' => $idVote->id]);
        //        $event->vote
    }
}
