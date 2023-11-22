@extends('layouts.app')
@section('title', 'Изменение данных о библиотеке '.$library->name)

@section('content')
    <h1>Изменение данных о библиотеке</h1><br>
    <form method="POST" action="{{ route('libraries.update', $library->id) }}">
        @csrf
        @method('PATCH')
        Название: <label>
            <input type="text" name="name" value="{{ $library->name }}">
        </label><br>
        Адрес: <label>
            <input type="text" name="address" value="{{ $library->address }}">
        </label><br>
        <input type="hidden" name="id" value="{{ $library->id }}">
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
