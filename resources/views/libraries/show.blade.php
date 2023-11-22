@extends('layouts.app')
@section('title',  $library->name)

@section('content')
    <h1>{{ $library->name }}</h1>
    <div>
        @if(session('success'))
            Библиотека добавлена в базу данных
        @endif
    </div>
    <label>Адрес: {{ $library->address }}</label><br>
    <label>Уникальный номер: {{ $library->id }}</label><br>
    <form action="{{ route('libraries.destroy', $library->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить библиотеку из базы данных">
    </form><br>
    <a href="{{ route('libraries.edit', $library->id) }}">Изменить данные о библиотеке</a>
@endsection
