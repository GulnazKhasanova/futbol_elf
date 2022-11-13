<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Topchart;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopchartController extends Controller
{
    public function index(){

        $topchart = Vote::select(Vote::$availableFields)->get();

        return view('topchart.index', [
            'topchartsList' => $topchart
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Topchart $topchart
     * @return void
     */
    public function create(){
//        Topchart::create(['id',
//            'id_gamer' => $voteItem,
//            'voices' => '',
//            'id_vote' => $updatedId
//        ]); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public  function store(Request $request){
        //
    }
    public function show(Topchart $topchart){
        $id = $topchart->id_vote;
        $data = DB::table('topchart')
            ->join('news', 'topchart.id_gamer', '=', 'news.id' )
            ->whereColumn('topchart.id_vote', '=', $id)
        ->get();

        return view('topchart.show',[
            'topchart' => $topchart,
            'gamer' => $data
        ]);
    }
}
