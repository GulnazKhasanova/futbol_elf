<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\News;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
   public function index(){
       $news = News::select(News::$availableFields)->get();


       return view('news.index', [
           'newsList' => $news
       ]);
   }


    public function create()
    {
        $news = News::select(News::$availableFields)->get();
        $role = Role::all();
        $logs = LogActivity::all();

        return view('news.create',[
            'news' => $news,
            'role' => $role,
            'logs' => $logs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = '';
        if($request->hasFile('image')) {
//            $image = $request->file('image');
            $path = $request->file('image')->store('avatars/', 'public');
        }
        $data = $request->only(['firstname','lastname','patronymic','phone','login','password','description', 'birthday', 'enter_club_date', 'admin',
                'status',
                'role_id']) + ['image'=>$path];


        $created = News::create($data);

        $createdId = $created->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();


        if($created){

            LogActivity::create(['id',
                'subject' => 'player',
                'method'  => 'created',
                'ip'      => $userIp,
                'user_id' => 1, /*auth()->user()->id,*/
                'session_id' => $sessionId,
                'to_user_id' => $createdId
            ]);

            return redirect()->route('account')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return void
     */
        public function show(News $news)
    {
        return view('news.show', [
            'news'=>$news
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return void
     */
    public function edit(News $news)
    {
        $role = Role::all();

        return view('news.edit',[
            'news' => $news,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return void
     */
    public function update(Request $request, News $news)
    {
        $path = '';
        if($request->hasFile('image')) {
//            $image = $request->file('image');
            $path = $request->file('image')->store('avatars/', 'public');
        }

        $data = $request->only(['firstname','lastname','patronymic','phone','login','password','description', 'birthday', 'enter_club_date', 'admin',
                'status',
                'role_id']) + ['image'=>$path];

        $updated = $news->fill($data)->save();
        $updatedId = $news->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();

        if($updated){
            LogActivity::create(['id',
                'subject' => 'player',
                'method'  => 'update',
                'ip'      => $userIp,
                'user_id' => auth()->user()->id,
                'session_id' => $sessionId,
                'to_user_id' => $updatedId
            ]);

            return redirect()->route('account')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return void
     */
    public function destroy(Request $request, News $news)
    {
        $news->delete();
        $deletedId = $news->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();

        if($news){
            LogActivity::create(['id',
                'subject' => 'player',
                'method'  => 'delete',
                'ip'      => $userIp,
                'user_id' => auth()->user()->id,
                'session_id' => $sessionId,
                'to_user_id' => $deletedId
            ]);
            return redirect()->route('account.index')
                ->with('success', 'Запись успешно удалена');
        }
        return redirect()->route('account.index')
            ->with('error', 'Не удалось удалить запись')
            ->withInput();
    }


}
