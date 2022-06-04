<?php

namespace App\Helpers;
use App\Http\Controllers\Helpers\Request;
use App\Models\LogActivity as LogActivityModel;

class LogActivity
{
    public static function addToLog($subject)
    {

            $log = [];
            $log['subject'] = $subject;
            $log['method'] = Request::method();;
            $log['ip'] = Request::ip();
            $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
            $log['to_user_id'] = auth()->check() ? auth()->user()->id : 1;
            LogActivityModel::create($log);

    }

    public static function logActivityLists(){

        return LogActivityModel::latest()->get();

    }
}
