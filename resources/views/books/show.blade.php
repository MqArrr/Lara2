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
    <div>
        @if(!isset($book->library))
            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PATCH')
                Передать библиотеке: <label>
                    <select name="library_id">
                        @foreach(\App\Models\Library::all() as $reader)
                            <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                        @endforeach
                    </select>
                </label>
                <input type="hidden" name="name" value="{{ $book->name }}">
                <input type="hidden" name="author" value="{{ $book->author }}">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="submit" value="Изменить">
            </form>

        @else
            Эта книга относится к библиотеке
            "<a href="{{ route('libraries.show', $book->library->id) }}"> {{ $book->library->name }}</a> "
            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="name" value="{{ $book->name }}">
                <input type="hidden" name="author" value="{{ $book->author }}">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="hidden" name="library_id" value="{{ null }}">
                <input type="submit" value="Открепить">
            </form>
        @endif
    </div>


    <div>
        @if(!isset($book->reader))
            В наличии
            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PATCH')
                Записать на читателя: <label>
                    <select name="reader_id">
                        @foreach(\App\Models\Reader::all() as $reader)
                            <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                        @endforeach
                    </select>
                </label>
                <input type="hidden" name="name" value="{{ $book->name }}">
                <input type="hidden" name="author" value="{{ $book->author }}">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="submit" value="Записать на читателя">
            </form>

        @else
            Эта у
            "<a href="{{ route('readers.index') }}"> {{ $book->reader->name }}</a> "
            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="name" value="{{ $book->name }}">
                <input type="hidden" name="author" value="{{ $book->author }}">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="hidden" name="library_id" value="{{ null }}">
                <input type="submit" value="Списать с читателя">
            </form>
        @endif
    </div>


    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить книгу">
    </form><br>
    <a href="{{ route('books.edit', $book->id) }}">Изменить книгу</a>
@endsection

