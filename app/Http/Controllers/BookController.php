<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name' => 'Название библиотеки должно быть длиной от 5 до 50 знаков.',
            'author' => 'Имя автора должно быть длиной от 1 до 255 знаков.'
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'author' => 'required|string|max:255',
        ], $messages);

        $book = Book::create($request->all());

        return redirect()->route('books.show', $book)->with('success', 'Книга успешно создана.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(StoreBook $request, $id)
    {
        $messages = [
            'name' => 'Название библиотеки должно быть длиной от 5 до 50 знаков.',
            'author' => 'Имя автора должно быть длиной от 1 до 255 знаков.'
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'author' => 'required|string|max:255',
        ], $messages);

        $book = Book::find($id);
        $book->library()->associate($request['library_id']);
        $book->reader()->associate($request['reader_id']);
        $book->update($request->all());
        return redirect()->route('books.show', $book)->with('success', 'Книга успешно обновлена.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Книга успешно удалена.');
    }
}
