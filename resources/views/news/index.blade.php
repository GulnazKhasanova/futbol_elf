@extends('layouts.main')
@section('title')
Участники команд - @parent
@endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список голосования</h1>
            <p class="lead text-muted">В этот список попадают только действующие футболисты, которые входят в клуб ЕЛФ</p>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">

     <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $news)
               <div class="col">
                   <div class="card shadow-sm">
                       @if(!$news->image)
                       <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото</text></svg>
                       @else
                           <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset($news->image)}}" focusable="false">
                       @endif
                       <div class="card-body">
                           <p>
                               <strong>
                                   <a href="{{ route('news.show', ['news' => $news]) }}">
                                       {{ $news->title }}
                                   </a>
                               </strong>
                           </p>
                           <p>Автор:{{ $news->author }}</p>
                           <p class="card-text">
                               {!! $news->description !!}
                           </p>
                           <div class="d-flex justify-content-between align-items-center">
                               <div class="btn-group">
                                   <a href="{{ route('news.show', ['news' => $news]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                               </div>
                               <small class="text-muted"> Дата: {{ $news->created_at }}</small>
                           </div>
                       </div>
                   </div>
               </div>
               @empty
       <h2>Записей нет</h2>
      @endforelse

    </div>
</div>
<hr>

@endsection

