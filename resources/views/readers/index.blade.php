@extends('layouts.app')
@section('title', 'Читатели')

@section('content')
    <h1>Читатели</h1>
    @foreach($readers as $reader)
        <a href="{{ route('readers.edit', $reader->id) }}">{{ $reader->name }}</a>
        <form action="{{ route('readers.destroy', $reader->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Удалить читателя">
        </form>Взятые книги:
        @foreach($reader->books as $book)
            <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
        @endforeach<br>
    @endforeach
    <br><a href="{{ route('readers.create') }}">Добавить читателя</a>
@endsection
