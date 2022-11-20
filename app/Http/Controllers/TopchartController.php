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
     * @param Topchart $topchart
     * @return void
     */

    public function show(Topchart $topchart){

//        $data = Vote::select(Vote::$availableFields)
//            ->where(['id' => $topchart])
//            ->get();
//        $counter = $data->counter;
//        $strItem = explode(" ", $counter);
//        $items =[];
//        foreach ($strItem as $gamer){
//            $items[] = DB::table('news')
//                ->where(['user_id' => $gamer]);
//        }

//        $data = DB::table('topchart')
//            ->join('news', 'topchart.id_gamer', '=', 'news.id' )
//            ->whereColumn('topchart.id_vote', '=', $id)
//        ->get();

        return view('topchart.show',[
            'topchart' => $topchart
//            'gamers' => $item
        ]);
    }
}
