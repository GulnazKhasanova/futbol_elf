@extends('layouts.admin')
@section('header')
    <h1 class="h2">Добавить игрока</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
@endsection
@section('content')
@include('inc.message')
    <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="lastname">Фамилия</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
        </div>
        <div class="form-group">
            <label for="firstname">Имя</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
        </div>
        <div class="form-group">
            <label for="patronymic">Отчество</label>
            <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{ old('patronymic') }}">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
        </div>
        <div>
            <label for="description">Характеристика</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
        </div>
        <div class="form-group">
            <label for="date">Год рождения</label>
            <input type="date" class="form-control" id="date" name="birthday" placeholder="Дата" required value="{{ old('birthday') }}">
        </div>

            @foreach($role as $el)
            <div class="form-check">
                <input class="form-check-input" type="radio" class="" id="role_id" name="role_id"  value="{{ $el->id }}"  >
                <label class="form-check-label" for="role_id">{{ $el->role }}</label>
            </div>
                @endforeach
        <div class="form-group">
            <label for="image">Загрузить файл</label>
            <input type="file" class="form-control" id="image" name="image" required >
        </div>

        <div class="form-group">
            <label for="enter_club_date">Дата вступления в клуб</label>
            <input type="date" class="form-control" id="enter_club_date " name="enter_club_date" required value="{{ old('enter_club_date') }}">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="admin" name="admin" @if( old('admin') === true) checked @endif">
            <label class="form-check-label" for="admin">Админ/Пользователь</label>
        </div>
        <div class="form-group">
            <label for="status">Статус в голосовании</label>
            <select class="form-control" id="status" name="status">
                <option @if(old('status') === 'ACTIVE' ) selected @endif>ACTIVE</option>
                <option @if(old('status') === 'BLOCKED' ) selected @endif>BLOCKED</option>
            </select>
        </div>
        <br>
        <button class="btn btn-success" type="submit" style="float: right">Сохранить</button>
    </form>
@endsection


