@extends('layouts.app')
@section('title', 'Изменение данных о читателе '.$reader->name)

@section('content')
    <h1>Изменение данных о читателе</h1><br>
    <form method="POST" action="{{ route('readers.update', $reader) }}">
        @csrf
        @method('PATCH')
        Имя: <label>
            <input type="text" name="name" value="{{ $reader->name }}">
        </label><br>
        Дата рождения: <label>
            <input type="date" name="author" value="{{ $reader->birth_date }}">
        </label><br>
        <input type="hidden" name="id" value="{{ $reader->id }}">
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
