<?php

namespace App\Http\Controllers\Admin;

use App\Models\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(2);

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = News::select(News::$availableFields)->get();
        $role = Role::all();
        $logs = LogActivity::all();

       return view('admin.news.create',[
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

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return void
     */
    public function show(News $news)
    {
        //
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

        return view('admin.news.edit',[
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
        $data = $request->only(['firstname','lastname','patronymic','phone','login','password','description', 'birthday', 'enter_club_date', 'admin',
            'status',
            'role_id']);

        $updated = $news->fill($data)->save();
        $updatedId = $news->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();

        if($updated){
            LogActivity::create(['id',
                'subject' => 'player',
                'method'  => 'update',
                'ip'      => $userIp,
                'user_id' => 1, /*auth()->user()->id,*/
                'session_id' => $sessionId,
                'to_user_id' => $updatedId
            ]);

            return redirect()->route('admin.news.index')
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
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно удалена');
        }
        return redirect()->route('admin.news.index')
            ->with('error', 'Не удалось удалить запись')
            ->withInput();
    }
}
