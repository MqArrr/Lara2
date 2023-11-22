@extends('layouts.app')
@section('title', 'Главная страница')

@section('content')
    <h2><a href="{{ route('libraries.index') }}">Библиотеки</a></h2><br>
    <h2><a href="{{ route('books.index') }}">Книги</a></h2><br>
    <h2><a href="{{ route('readers.index') }}">Читатели</a></h2><br>
@endsection
