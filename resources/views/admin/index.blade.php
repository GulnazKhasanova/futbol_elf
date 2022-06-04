@extends('layouts.admin')
@section('header')
    <h1 class="h2"> Панель управления</h1>

@endsection
@section('content')
    <div class="table-responsive">
       Панель управления
        @php
            $msg = "Это сообщение создано динамически";
        @endphp
{{--        <x-alert type="success" message="Запись успешно добавлена"></x-alert>--}}
{{--        <x-alert type="danger" message="Запись не добавлена"></x-alert>--}}
{{--        <x-alert type="warning" :message="$msg"></x-alert>--}}
    </div>
@endsection
