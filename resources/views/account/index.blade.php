@extends('layouts.main')
@section('title')
    Участник - @parent
@endsection
@section('header')
    <h1 class="h2">Страница игрока</h1>
    <h2>{{ Auth::user()->name }}, добро пожаловать на сайт ELF</h2>
    <nav class="nav">
    @if(Auth::user()->is_admin)
        <a class="nav-link" href="{{ route('admin.index') }}" >В админку</a>
    @endif
    @if($news)

        <a class="nav-link" href="{{ route('news.edit', $news ) }}" >Редактировать профиль</a>
    @else
        <a class="nav-link" href="{{ route('news.create') }}" >Создать профиль</a>
    @endif
        <a class="nav-link" href="{{ route('account.logout') }}" >Выход</a>
    </nav>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')
    @if($news)
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">Обо мне</h3>
{{--                        <h6 class="theme-color lead"> {{$news->role}}</h6>--}}
                        <p>Я <mark>{{$news->firstname}}<mark> {!! $news->lastname !!} вступил в клуб {{$news->enter_club_date}}</p>
                        <div class="row about-list">
                            <div class="col-sm-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-avatar">

                        @if(!$news->image)
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото</text></svg>
                        @else
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset($news->image)}}" focusable="false">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form id="votingform" method="get" class="my-3">
        @csrf
        @method('post')
        <input type="hidden" name="id" id="{{$news->id}}"  >
        <button @if(count($arrCount)>10) disabled @endif class="btn btn-success" id="vote" type="submit" style="float: right">Голосовать</button>
    </form>
    @else
        <h2>Профиль не заполнен</h2>
    @endif

@endsection
