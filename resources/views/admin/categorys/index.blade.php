@extends('layouts.admin')
@section('header')
    <h1 class="h2">Список игроков</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categorys.create') }}" type="button"
               class="btn btn-sm btn-outline-secondary">Добавить</a>

        </div>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
        Список игроков
    </div>
@endsection
