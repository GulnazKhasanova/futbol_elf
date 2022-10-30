<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vote = Vote::all();

        return view('admin.vote.index',[
            'voteList' => $vote
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vote = Vote::select(Vote::$availableFields)->get();
        $logs = LogActivity::all();



        return view('admin.vote.create', [
            'vote' => $vote,
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
        $data =  $request->only(['name_vote','date_start','date_finish', 'created_at', 'updated_at', 'counter']);

        $created = Vote::create($data);
        $createdId = $created->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();

        if ($created) {
            LogActivity::create(['id',
                'subject' => 'vote',
                'method'  => 'created',
                'ip'      => $userIp,
                'user_id' => auth()->user()->id,
                'session_id' => $sessionId,
                'to_user_id' => $createdId
            ]);

            return redirect()->route('admin.vote.index')
                ->with('success', 'Запись успешно добавлена');
        }


        return  back()->with('error', 'Не удалось добавить запись')
        ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Vote $vote
     * @return void
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vote $vote
     * @return void
     */
    public function edit(Vote $vote)
    {
        return view('admin.vote.edit',[
            'vote' => $vote
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Vote $vote
     * @return void
     */
    public function update(Request $request, Vote $vote)
    {
        $data = $request->only(['name_vote','date_start','date_finish', 'created_at', 'updated_at', 'counter']);

        $updated = $vote->fill($data)->save();
        $updatedId = $vote->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();
        if($updated){
            LogActivity::create(['id',
                'subject' => 'vote',
                'method'  => 'update',
                'ip'      => $userIp,
                'user_id' => auth()->user()->id,
                'session_id' => $sessionId,
                'to_user_id' => $updatedId
            ]);
            return redirect()->route('admin.vote.index')
                ->with('success', 'Вы успешно изменили голосование');
        }
        return back()->with('error', 'Не удалось изменить госование')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vote $vote
     * @return void
     */
    public function destroy(Request $request,Vote $vote)
    {
        $vote->delete();
        $deletedId = $vote->id;
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();

        if($vote){
            LogActivity::create(['id',
                'subject' => 'vote',
                'method'  => 'delete',
                'ip'      => $userIp,
                'user_id' => auth()->user()->id,
                'session_id' => $sessionId,
                'to_user_id' => $deletedId
            ]);
            return redirect()->route('admin.vote.index')
                ->with('success', 'Запись успешно удалена');
        }
        return redirect()->route('admin.vote.index')
            ->with('error', 'Не удалось удалить запись')
            ->withInput();

    }
}
