<?php

namespace App\Http\Controllers\Ajax;

use App\Events\VoteClose;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
   public function vote(Request $request, int $id)
   {
       $voteItem = '';
       $vote = DB::table('vote')
           ->whereNull('date_finish')
           ->first();
       if ($vote){
           $counter = $vote->counter;
           $tr = trim($counter);
           $vot = count(explode(" ",$tr));
           if($vot < 10){
               if($id) {
                   if (str_contains($counter, $id) !== true){
                       $flag ='';
                       $voteItem = $id;
                       $updatedId = $vote->id;
                       $userIp = $request->ip();
                       $sessionId = $request->session()->getId();
                       $counter .= $voteItem . " ";
                       DB::table('vote')
                           ->whereNull('date_finish')
                           ->update(['counter' => $counter]);
                       $flag = $counter;
                       if ($flag) {
                           LogActivity::create(['id',
                               'subject' => 'vote',
                               'method' => 'update',
                               'ip' => $userIp,
                               'user_id' => auth()->user()->id,
                               'session_id' => $sessionId,
                               'to_user_id' => $updatedId
                           ]);
                       }
                       return response()->json($counter);
                   } else {
                       return response()->json('no');
                   }
               }
           }
           if ($vot == 10) {
               DB::table('vote')
                   ->whereNull('date_finish')
                   ->update(['date_finish' => date("Y-m-d H:i:s")]);
               broadcast( new VoteClose($vot));
               return response()->json('off');
           }

//           return response()->json($counter);
       } else {
           return response()->json('close');
       }

   }
}
