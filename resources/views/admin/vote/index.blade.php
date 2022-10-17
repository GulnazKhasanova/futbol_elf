@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список голосований</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.vote.create') }}" type="button"
               class="btn btn-sm btn-outline-secondary">Добавить голосование</a>

        </div>
    </div>
@endsection
@section('content')
    @include('inc.message')
    <div class="row">
        <div class="col-md-1">ID</div>
        <div class="col-md-2">ГОЛОСОВАНИЕ</div>

        <div class="col-md-2">ДАТА/ВРЕМЯ НАЧАЛА</div>
        <div class="col-md-2">ДАТА/ВРЕМЯ ЗАВЕРШЕНИЯ</div>
        <div class="col-md-5"></div>

    </div>
    <div class="row">
        @forelse($voteList as $vote)
            <div class="col-md-1">{{ $vote->id }}</div>
            <div class="col-md-2">{{ $vote->name_vote }}</div>
            <div class="col-md-2">{{ $vote->date_start }}</div>
            <div class="col-md-2">{{ $vote->date_finish }}</div>

            <div class="col-md-5 justify-content-center d-flex">
{{--                <a href="{{ route('admin.vote.edit', ['vote'=>$vote]) }}">Ред.</a>--}}
                <a href="{{ route('admin.vote.edit', ['vote'=>$vote]) }}">Редактировать</a> &nbsp;
                <form method="POST" action="{{route('admin.vote.destroy', ['vote'=>$vote]) }}"  >
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Удалить</button>
                </form>
            </div>
        @empty
            <h2>Записей нет</h2>
        @endforelse
{{--        {{ $voteList->links() }}--}}
    </div>

@endsection
