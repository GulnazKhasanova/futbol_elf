@extends('layouts.admin')
@section('header')
    <h1 class="h2">Добавить игрока</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    <form action="{{ route('admin.category.store', ['q' => 1]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="surname">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
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
            <label for="date">Год рождения</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Дата" required value="{{ old('date') }}">
        </div>
        <div class="form-group">
            <label for="role">Амплуа</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}">
        </div>
        <div class="form-group">
            <label for="date-introduct">Дата вступления в клуб</label>
            <input type="date" class="form-control" id="date-introduct" name="date-introduct" placeholder="Дата" required value="{{ old('date-introduct') }}">
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

