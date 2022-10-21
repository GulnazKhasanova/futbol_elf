@extends('layouts.main')
@section('title')
    Участник - @parent
@endsection
@section('header')
    <h1 class="h2">Страница игрока</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')

    <form action="{{ route('news.update', $news) }}" method="post">
        @csrf
        @method('put')
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @if(!$news->image)
                            <svg class="rounded-circle mt-5" width="150px" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото</text></svg>
                        @else
                            <img class="rounded-circle mt-5" width="150px" src="{{asset('public/storage/'.$news->image)}}" focusable="false">
                        @endif
                        <span class="font-weight-bold">{{ $news->lastname }}&nbsp;{{ $news->firstname }}</span><span class="text-black-50">{{ $news->phone }}</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Редактировать анкету</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label for="lastname" class="labels">Фамилия</label><input type="text" class="form-control" id="lastname" name="lastname" value="{{ $news->lastname }}"></div>
                            <div class="col-md-6"><label for="firstname" class="labels">Имя</label><input type="text" class="form-control" id="firstname" name="firstname" value="{{ $news->firstname }}"></div>
                            <div class="col-md-6"><label for="patronymic" class="labels">Отчество</label><input type="text" class="form-control" id="patronymic" name="patronymic" value="{{$news->patronymic }}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label for="phone" class="labels">Телефон</label><input type="text" class="form-control" id="phone" name="phone" value="{{ $news->phone }}"></div>
                            <div class="col-md-12"><label for="login" class="labels">Логин</label><input type="text" class="form-control" id="login" name="login" value="{{ $news->login}}"></div>
                            <div class="col-md-12"><label for="password" class="labels">Пароль</label><input type="text" class="form-control" id="password" name="password" value="{{ $news->password }}"></div>
                            <div class="col-md-12"><label for="description" class="labels">Характеристика</label><input type="text" class="form-control" id="description" name="description" value="{{ $news->description }}"></div>
                            <div class="col-md-12"><label class="labels">Год рождения</label><input type="date" class="form-control" id="date" name="birthday" placeholder="Дата" required value="{{ \Carbon\Carbon::parse($news->birthday)->format('Y-m-d') }}"></div>
                            {{--                    @foreach($role as $el)--}}
                            {{--                    <div class="col-md-12 form-check"><label class="form-check-label" for="role_id">{{ $el->role }}</label><input class="form-check-input" type="radio" class="" id="role_id" name="role_id" @if($news->role_id === $el->id) value="{{ $news->role_id }}" checked @else value="{{ $el->id }}"  @endif  ></div>--}}
                            {{--                    @endforeach--}}
                            <div class="col-md-12"><label class="labels">Дата вступления в клуб</label><input type="date" class="form-control" id="enter_club_date " name="enter_club_date" value="{{ \Carbon\Carbon::parse($news->enter_club_date)->format('Y-m-d') }}"></div>
                            <div class="col-md-12"><label class="labels" for="status">Статус в голосовании</label>
                                <input type="text" disabled class="form-control" value="Active">
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-success" type="submit" style="float: right">Сохранить</button></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
