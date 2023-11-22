@extends('layouts.app')
@section('title', 'Новый читатель')

<h1>Добавление читателя</h1>

@section('content')
    <form method="POST" action="{{ route('readers.store') }}">
        @csrf
        <label>Имя: </label><label>
            <input type="text" name="name">
        </label><br>
        <label>Дата рождения: </label><label>
            <input type="date" name="birth_date">
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
