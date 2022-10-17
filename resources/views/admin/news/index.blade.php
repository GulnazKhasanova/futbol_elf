@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список игроков</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" type="button"
               class="btn btn-sm btn-outline-secondary">Добавить игрока</a>

        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <div class="row">
        <div class="col-md-1">ID</div>
        <div class="col-md-1">ИМЯ</div>
        <div class="col-md-1">ФАМИЛИЯ</div>
        <div class="col-md-1">ОТЧЕСТВО</div>
        <div class="col-md-1">Телефон</div>

        <div class="col-md-1">Характеристика</div>
        <div class="col-md-1">День рождения</div>
        <div class="col-md-1">Дата вступления в клуб</div>
        <div class="col-md-1">Амплуа</div>
        <div class="col-md-1">Адм/Пол</div>
        <div class="col-md-1">Статус</div>
        <div class="col-md-1">Действие</div>
    </div>
    <div class="row">
        @forelse($newsList as $news)
            <div class="col-md-1">{{ $news->id }}</div>
            <div class="col-md-1">{{ $news->firstname }}</div>
            <div class="col-md-1">{{ $news->lastname }}</div>
            <div class="col-md-1">{{ $news->patronymic }}</div>
            <div class="col-md-1">{{ $news->phone }}</div>

            <div class="col-md-1">{{ $news->description }}</div>
            <div class="col-md-1">{{ $news->birthday }}</div>
            <div class="col-md-1">{{ $news->enter_club_date }}</div>
            <div class="col-md-1">{{ $news->role_id }}</div>
            <div class="col-md-1">{{ $news->admin }}</div>
            <div class="col-md-1">{{ $news->status }}</div>
            <div class="col-md-1"><a href="{{ route('admin.news.edit', ['news'=>$news]) }}">Ред.</a> &nbsp;
                <form method="POST" action="{{ route('admin.news.destroy', ['news'=>$news]) }}"  >
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Удалить</button>
                </form>
            </div>
        @empty
            <h2>Записей нет</h2>
        @endforelse
            {{ $newsList->links() }}
    </div>

@endsection
