<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Http\Requests\StoreLibrary;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::all();
        return view('libraries.index', compact('libraries'));
    }

    public function create()
    {
        return view('libraries.create');
    }

    public function store(Request $request)
    {
        $messages = [//логику валидации стоит перенести в класс Validator, но пока так:)
            'name' => 'Название библиотеки должно быть длиной от 5 до 50 знаков.',
            'address' => 'Адрес должен быть длиной от 5 до 100 знаков.'
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'address' => 'required|string|min:5|max:100',
        ], $messages);

        $library = Library::create($request->all());

        return redirect()->route('libraries.show', $library)->with('success', 'Библиотека успешно добавлена.');
    }

    public function show(Library $library)
    {
        return view('libraries.show', compact('library'));
    }

    public function edit(Library $library)
    {
        $library = Library::find($library->id);
        return view('libraries.edit', compact('library'));
    }

    public function update(StoreLibrary $request, $id)
    {
        $messages = [
            'name' => 'Название библиотеки должно быть длиной от 5 до 50 знаков.',
            'address' => 'Адрес должен быть длиной от 5 до 100 знаков.'
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'address' => 'required|string|min:5|max:100',
        ], $messages);

        $library = Library::find($id);
        $library->update($request->all());
        return redirect()->route('libraries.show', $library)->with('success', 'Данные о библиотеке были успешно обновлены.');
    }

    public function destroy(Library $library)
    {
        $library->delete();

        return redirect()->route('libraries.index')->with('success', 'Библиотека успешно удалена.');
    }
}
