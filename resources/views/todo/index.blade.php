@extends('layouts.main')

@section('content')

{{--    Фильтр по статусу--}}
    <div class="d-flex justify-content-between">
     <h2 for="title">Список задач</h2>
     <form  action="{{route('todo.index')}}" method="get">
        <label for="status">Фильтр по статусу:</label>
        <div class="d-flex ">
            <select  class="form-select w-50" aria-label="Default select example" id="status" name="status">
                <option  value="">Все</option>
                <option value="Завершено" {{ session('status') == 'Завершено' ? 'selected' : '' }}>Завершено</option>
                <option value="Не завершено" {{  session('status') == 'Не завершено' ? 'selected' : '' }}>Не завершено</option>
            </select>
            <button class="btn btn-success mx-2" type="submit">Применить</button>
        </div>
    </form>
    </div>

{{--    Список задач--}}
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата завершения</th>
            <th scope="col">Статус</th>
            <th scope="col">Изменить</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @if($tasks->count() == 0)
        <tr>
            <td colspan="7">Нет задач</td>
        </tr>
        @else
        @foreach($tasks as $task)
        <tr>
            <th scope="row">{{$loop->index + $tasks->firstItem()}}</th>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{date('d.m.Y', strtotime($task->date))}}</td>
            <td>{{$task->status}}</td>
            <td><a href="{{route('todo.edit', $task->id)}}" type="button" class="btn btn-primary">Изменить</a></td>
            <td>
                <form action="{{ route('todo.destroy', $task->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>

    </table>

{{--Пагинация--}}
<div class="d-flex justify-content-center">
    {{$tasks->links()}}
</div>
@endsection
