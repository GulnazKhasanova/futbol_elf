<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $arrCount = [];

        $vote = Vote::where('date_finish', '=', null)->first();
//        dd($vote);
        if($vote){
            $counter = $vote->counter;
            if ($counter) {
                $arrCount = explode(" ", trim($counter));
            }
            else {
                $arrCount = [];
            }
        }

        $user = Auth::user()->id;
        $news = News::findOrFail(Auth::user()->news_id);
        return view('account.index', [
            'user'     => User::findOrFail($user),
            'news'     =>$news,
            'arrCount' => $arrCount
        ]);
//        return view('account.index');
    }
}
