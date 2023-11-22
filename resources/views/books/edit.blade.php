@extends('layouts.app')
@section('title', 'Изменение данных о книге '.$book->name)

@section('content')
    <h1>Изменение данных о книге</h1><br>
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PATCH')
        Название: <label>
            <input type="text" name="name" value="{{ $book->name }}">
        </label><br>
        Название: <label>
            <input type="text" name="author" value="{{ $book->author }}">
        </label><br>
        <input type="hidden" name="id" value="{{ $book->id }}">
        <input type="submit" value="Изменить">
    </form>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
