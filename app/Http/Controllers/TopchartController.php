<?php

namespace App\Http\Controllers;

use App\Models\Topchart;
use Illuminate\Http\Request;

class TopchartController extends Controller
{
    public function index(){
        $topchart = Topchart::select(Topchart::$availableFields)->get();

        return view('topchart.index', [
            'topchartList' => $topchart
        ]);
    }

    public function show(Topchart $topchart){

        return view('topchart.show',[
            'topchart' => $topchart
        ]);
    }
}
