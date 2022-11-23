@extends('layouts.main')
@section('title')
    Рейтинг игроков от {{ $topchart->created_at }}@parent
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Команда игроков №{{ $topchart->id }}</h1>
            <p class="lead text-muted">Дата голосования: {{ $topchart->created_at }}</p>
        </div>
    </div>
@endsection
@section('content')
  <div class="container">
    <div class="row">
        @forelse($gamers as $gamer)
        <div class="col-lg-4">
            <div class="text-center card-box">
                <div class="member-card pt-2 pb-2">
                    <div class="thumb-lg member-thumb mx-auto"><img src="{{$gamer->image}}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                    <div class="">
                        <h4>{!! $gamer->firstname !!}</h4>
                        <p class="text-muted">амплуа игрока</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
        @empty
            <h2>Нет игроков</h2>
        @endforelse
    </div>
  </div>
@endsection

