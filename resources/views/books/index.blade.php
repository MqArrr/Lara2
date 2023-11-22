@extends('layouts.app')
@section('title', 'Все книги')

@section('content')
    <h1>Книги</h1><br>
    <div>@if(session('success'))
            Книга удалена.
        @endif</div>
    <div>
        @foreach($books as $book)
            <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}, {{$book->author}}</a><br>
        @endforeach
    </div>
    <br><a href="{{ route('books.create') }}">Добавить книгу</a>
@endsection
