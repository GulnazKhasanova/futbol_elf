<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   public function index(){
       $news = News::select(News::$availableFields)->get();


       return view('news.index', [
           'newsList' => $news
       ]);
   }
    public function show(News $news)
{
//       $news = News::findOrFail($id);

        return view('news.show', [
            'news'=>$news
        ]);
    }

}
