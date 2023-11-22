<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Отображаем список всех книг
    public function index()
    {
        // Получаем все книги из базы данных
        $books = Book::all();
        // Возвращаем вид index.blade.php с передачей переменной books, функция compact сама
        return view('books.index', compact('books'));
    }

    // Отображаем форму для создания новой книги
    public function create()
    {
        // Возвращаем вид create.blade.php
        return view('books.create');
    }

    // Сохраняем новую книгу в базе данных
    public function store(Request $request)
    {
        // Валидируем входящие данные
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        // Создаем новую книгу с помощью метода create
        $book = Book::create($request->all());

        // Перенаправляем на страницу книги с сообщением об успехе
        return redirect()->route('books.show', $book)->with('success', 'Книга успешно создана.');
    }

    // Отображаем информацию об одной книге
    public function show(Book $book)
    {
        // Возвращаем вид show.blade.php с передачей переменной book
        return view('books.show', compact('book'));
    }

    // Отображаем форму для редактирования существующей книги
    public function edit(Book $book)
    {
        // Возвращаем вид edit.blade.php с передачей переменной book
        return view('books.edit', compact('book'));
    }

    // Обновляем существующую книгу в базе данных
    public function update(StoreBook $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::find($id);
        $book->update($request->all());
        // Перенаправляем на страницу книги с сообщением об успехе
        return redirect()->route('books.show', $book)->with('success', 'Книга успешно обновлена.');
    }

    // Удаляем существующую книгу из базы данных
    public function destroy(Book $book)
    {
        // Удаляем книгу с помощью метода delete
        $book->delete();

        // Перенаправляем на страницу со списком книг с сообщением об успехе
        return redirect()->route('books.index')->with('success', 'Книга успешно удалена.');
    }
}
