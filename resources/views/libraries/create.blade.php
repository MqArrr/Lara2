@extends('layouts.app')
@section('title', 'Добавление библиотеки')

<h1>Добавить библиотеку</h1>

@section('content')
    <form method="POST" action="{{ route('libraries.store') }}">
        @csrf
        <label>Название библиотеки: </label><label>
            <input type="text" name="name">
        </label><br>
        <label>Адрес: </label><label>
            <input type="text" name="address">
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
