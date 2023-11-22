@extends('layouts.app')
@section('title',  $book->name)

@section('content')
    <h1>{{ $book->name }}</h1>
    <div>
        @if(session('success'))
            Книга добавлена в базу данных.
        @endif
    </div>
    <label>Автор: {{ $book->author }}</label><br>
    <label>Уникальный номер: {{ $book->id }}</label><br>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить книгу">
    </form><br>
    <a href="{{ route('books.edit', $book->id) }}">Изменить книгу</a>
@endsection
