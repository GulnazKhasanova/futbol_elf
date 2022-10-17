@extends('layouts.admin')
@section('header')
    <h1 class="h2">Редактировать голосование</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <form action="{{ route('admin.vote.update', ['vote' => $vote]) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="lastname">Наименование</label>
            <input type="text" class="form-control" id="name_vote" name="name_vote" value="{{ $vote->name_vote }}">
        </div>

        <div class="form-group">
            <label for="date_start">Дата/время старта голосования</label>
            <input type="datetime-local" class="form-control" id="date_start" name="date_start" placeholder="Дата" required value="{{  $vote->date_start }}">
        </div>

        <div class="form-group">
            <label for="date_finish">Дата/время завершения голосования</label>
            <input type="datetime-local" class="form-control" id="date_finish " name="date_finish" required value="{{  $vote->date_finish }}">
        </div>
        <br>
        <button class="btn btn-success" type="submit" style="float: right">Сохранить</button>
    </form>
@endsection



