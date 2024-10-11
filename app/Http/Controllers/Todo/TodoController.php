<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index(Request $request)
    {
        // Добавление в сессию статуса
        session(['status' => $request->input('status')]);

        // Фильтрация по наличию статуса
        $tasks = Todo::when($request->input('status'), function ($query) use ($request) {
            return $query->where('status', $request->input('status'));
        })->orderBy('id', 'asc')->paginate(5);

        //Добавляем параметры страницы для пагинации отфильтрованных данных
        $tasks->appends($request->except('page'));

        return view('todo.index', compact('tasks'));
    }


    public function create()
    {
        return view('todo.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Todo::create($data);
        return redirect()->route('todo.index');

    }

    public function edit(Request $request)
    {
        $task = Todo::find($request->id);
        return view('todo.edit',compact('task'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $task = Todo::find($id);
        $data = $request->validated();
        $task->update($data);
        return redirect()->route('todo.index');
    }

    public function destroy(Todo $task, $id)
    {
        $task = Todo::find($id);
        $task->delete();
        return redirect()->route('todo.index');
    }
}
