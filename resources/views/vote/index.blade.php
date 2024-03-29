@extends('layouts.main')
@section('title')
    Список голосований - @parent
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список голосований</h1>
            <p class="lead text-muted">Голосования клуба ЕЛФ</p>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($voteList as $vote)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                        <div class="card-body">
                            <p>
                                <strong>
                                    <a href="{{ route('news.show', ['id' => $vote->id]) }}">
                                        Голосование от {{$vote->created_at}} по ...
                                    </a>
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Записей нет</h2>
            @endforeach
        </div>
    </div>
    <hr>

@endsection


