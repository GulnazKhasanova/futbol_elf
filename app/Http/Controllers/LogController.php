<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class LogController extends Controller
{
     public function index()
     {
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
