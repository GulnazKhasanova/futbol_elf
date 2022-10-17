@extends('layouts.main')
@section('title')
    Рейтинг игроков от {{ $topchart->created_at }}@parent
@endsection
@section('content')
    <div>
        <h2>Рейтинг игроков №{{ $topchart->id }}</h2>
        <p> Дата голосования: {{ $topchart->created_at }}</p>
        <p> {!! $topchart->id_gamer !!}</p>
        <p> {!! $topchart->voices !!}</p>
        <p> {!! $topchart->id_vote !!}</p>
    </div>
@endsection

