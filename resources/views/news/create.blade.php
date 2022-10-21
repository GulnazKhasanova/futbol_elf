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
    <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data>
        @csrf
        @method('put')
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <svg class="rounded-circle mt-5" width="150px" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото</text></svg>

{{--                        <span class="font-weight-bold">{{ $news->lastname }}&nbsp;{{ $news->firstname }}</span><span class="text-black-50">{{ $news->phone }}</span><span> </span>--}}
                    </div>
                 </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Создать анкету</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label for="lastname" class="labels">Фамилия</label><input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}"></div>
                            <div class="col-md-6"><label for="firstname" class="labels">Имя</label><input type="text" class="form-control" id="firstname" name="firstname" value="{{  old('firstname')}}"></div>
                            <div class="col-md-6"><label for="patronymic" class="labels">Отчество</label><input type="text" class="form-control" id="patronymic" name="patronymic" value="{{ old('patronymic') }}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label for="phone" class="labels">Телефон</label><input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"></div>
                            <div class="col-md-12"><label for="login" class="labels">Логин</label><input type="text" class="form-control" id="login" name="login" value="{{  old('login')}}"></div>
                            <div class="col-md-12"><label for="password" class="labels">Пароль</label><input type="text" class="form-control" id="password" name="password" value="{{  old('password') }}"></div>
                            <div class="col-md-12"><label for="description" class="labels">Характеристика</label><input type="text" class="form-control" id="description" name="description" value="{{  old('description') }}"></div>
                            <div class="col-md-12"><label class="labels">Год рождения</label><input type="date" class="form-control" id="date" name="birthday" placeholder="Дата" required value="{{ old('birthday') }}"></div>
                            @foreach($role as $el)
                                <div class="form-check col-md-12">
                                    <input class="form-check-input" type="radio" class="" id="role_id" name="role_id"  value="{{ $el->id }}"  >
                                    <label class="form-check-label" for="role_id">{{ $el->role }}</label>
                                </div>
                            @endforeach
                            <div class="form-group col-md-12">
                                <label for="image">Загрузить фото</label>
                                <input type="file" class="form-control" id="image" name="image" required >
                            </div>
                            <div class="col-md-12"><label class="labels">Дата вступления в клуб</label><input type="date" class="form-control" id="enter_club_date " name="enter_club_date" value="{{ old('enter_club_date') }}"></div>
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

