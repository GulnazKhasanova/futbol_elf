<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index(){
        $vote = Vote::select(Vote::$availableFields)->get();

        return view('vote.index',[
            'voteList' => $vote
        ]);

    }

    public function show(Vote $vote){

        return view('vote.show', [
            'vote' => $vote
        ]);

    }
}
