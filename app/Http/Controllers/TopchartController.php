<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\TopChart;
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
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param Topchart $topchart
//     * @return void
//     */
//    public function create(){
//    //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public  function store(Request $request){
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return void
     */

    public function show($id){

        $topChart = TopChart::where('id_vote', '=', $id)
            ->first();

        $data = DB::table('news')
            ->join('users', 'users.news_id', '=', 'news.id')
            ->join('top_chart', 'top_chart.id_gamer', '=', 'users.id')
            ->where('top_chart.id', '=', $topChart->id)
            ->get();


        return view('topchart.show',[
            'topchart' => $topChart,
            'gamers' => $data
        ]);
    }
}
