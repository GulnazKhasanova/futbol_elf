<?php

namespace App\Http\Controllers\Admin;;


use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $logs= LogActivity::paginate(15);

         return view('admin.logs.index', [
             'logsList' => $logs
         ]);

//         return view('admin.logs.index');
     }

     public function myTestAddToLog(){
         LogActivity::addToLog('My Testing Add To Log.');

         dd('log insert successfully.');
      }

     public function logActivity(){

         $logs = LogActivity::logActivityLists();

         return view('logActivity',['logs'=>$logs]);

     }
}
