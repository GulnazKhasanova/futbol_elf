<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\Vote;
use Illuminate\Http\Request;

class VotingController extends Controller
{
   public function vote(Request $request)
   {
       $voteItem = '';

       $vote = Vote::where('date_finish', '=', null)->first();
       $counter = $vote->counter;
           if($_POST) {
               $voteItem = $_POST['index'];
               $updated = $vote->fill(['counter' => $counter])->save();
               $updatedId = $vote->id;

               $userIp = $request->ip();
               $sessionId = $request->session()->getId();
               $counter .= $voteItem . " ";

               if ($updated) {
                   LogActivity::create(['id',
                       'subject' => 'vote',
                       'method' => 'update',
                       'ip' => $userIp,
                       'user_id' => auth()->user()->id,
                       'session_id' => $sessionId,
                       'to_user_id' => $updatedId
                   ]);
               }
//              dd($counter);
               return $counter;
           }
       return $counter;
   }
}
