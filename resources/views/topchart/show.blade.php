@extends('layouts.main')
@section('title')
    Рейтинг игроков от {{ $topchart->created_at }}@parent
@endsection
@section('content')
    <div>
        <h2>Рейтинг игроков №{{ $topchart->id }}</h2>
        <p> Дата голосования: {{ $topchart->created_at }}</p>
        @forelse($gamers as $gamer)
        <p> {!! $gamer->firstname !!}</p>
        <p> {!! $gamer->phone !!}</p>
        <p> {!! $gamer->image !!}</p>
        @empty
        <h2>Нет игроков</h2>
        @endforelse
    </div>
@endsection

