@extends('layouts.main')
@section('title')
    Голосование от {{ $vote->created_at }}@parent
@endsection
@section('content')
<div>
    <h2>Голосование №{{ $vote->id }}</h2>
    <p> Дата создания: {{ $vote->created_at }}</p>
    <p> {!! $news->description !!}</p>
</div>
@endsection
