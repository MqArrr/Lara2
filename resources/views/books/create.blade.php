@extends('layouts.app')
@section('title', 'Новая книга')

<h1>Добавить книгу</h1>

@section('content')
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <label>Название книги: </label><label>
            <input type="text" name="name">
        </label><br>
        <label>Имя автора: </label><label>
            <input type="text" name="author">
        </label><br>
        <input type="submit" value="Отправить">
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
