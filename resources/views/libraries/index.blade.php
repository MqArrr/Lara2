@extends('layouts.app')
@section('title', 'Список библиотек')

@section('content')
    <h1>Библиотеки</h1><br>
    <div>@if(session('success'))
            Библиотека удалена.
        @endif</div>
    <div>
        @foreach($libraries as $library)
            <a href="{{ route('libraries.show', $library) }}">{{ $library->name }}, {{$library->address}}</a><br>
        @endforeach
    </div>
    <br><a href="{{ route('libraries.create') }}">Добавить библиотеку</a>
@endsection
