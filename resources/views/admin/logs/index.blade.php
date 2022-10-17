@extends('layouts.admin')
@section('header')
    <h1 class="h2">Записи Логов</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="" type="button"
               class="btn btn-sm btn-outline-secondary">Скачать</a>

        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <div class="row">
        <div class="col-md-1">ID</div>
        <div class="col-md-1">subject</div>
        <div class="col-md-1">method</div>
        <div class="col-md-1">ip</div>
        <div class="col-md-1">user_id</div>
        <div class="col-md-3">session_id</div>
        <div class="col-md-1">to_user_id</div>
        <div class="col-md-1">created_at</div>
        <div class="col-md-1">updated_at</div>
        <div class="col-md-1"></div>

    </div>
    <div class="row">
        @forelse ($logsList as $logs)
            <div class="col-md-1">{{ $logs->id }}</div>
            <div class="col-md-1">{{ $logs->subject }}</div>
            <div class="col-md-1">{{ $logs->method }}</div>
            <div class="col-md-1">{{ $logs->ip }}</div>
            <div class="col-md-1">{{ $logs->user_id }}</div>
            <div class="col-md-3">{{ $logs->session_id }}</div>
            <div class="col-md-1">{{ $logs->to_user_id }}</div>
            <div class="col-md-1">{{ $logs->created_at }}</div>
            <div class="col-md-1">{{ $logs->updated_at }}</div>
            <div class="col-md-1"></div>

        @empty
            <h2>Записей нет</h2>
        @endforelse
        {{ $logsList->links() }}
    </div>

@endsection

