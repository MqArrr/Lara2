<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storereader;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::all();
        return view('readers.index', compact('readers'));
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name' => 'Название библиотеки должно быть длиной от 5 до 50 знаков.',
            'birth_date' => 'Дата должна соответствовать формату день-месяц-год.'
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'birth_date' => 'required|date|date_format:Y-m-d',
        ], $messages);

        $reader = Reader::create($request->all());

        return redirect()->route('readers.index', $reader)->with('success', 'Читатель успешно создан.');
    }

    public function edit(Reader $reader)
    {
        return view('readers.edit', compact('reader'));
    }

    public function update(StoreReader $request, $id)
    {
        $messages = [
            'name' => 'Название библиотеки должно быть длиной от 5 до 50 знаков.',
            'birth_date' => 'Дата должна соответствовать формату день-месяц-год.'
        ];

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'birth_date' => 'required|date|date_format:Y-m-d',
        ], $messages);

        $reader = Reader::find($id);
        $reader->update($request->all());
        return redirect()->route('readers.index', $reader)->with('success', 'Читатель успешно обновлён.');
    }

    public function destroy(Reader $reader)
    {
        $reader->delete();

        return redirect()->route('readers.index')->with('success', 'Читатель успешно удалён.');
    }
}
