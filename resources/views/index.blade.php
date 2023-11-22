@extends('layouts.app')
@section('title', 'Главная страница')

@section('content')
    <h1>Библиотека</h1><br>
    <h2><a href="{{ route('books.index') }}">Книги</a></h2><br>
    <h2>Читатели</h2><br>
@endsection
