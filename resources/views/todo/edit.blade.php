@extends('layouts.main')

@section('content')

    <h2 for="title">Изменить задачу</h2>
    <form action="{{route('todo.update', $task->id)}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group w-50 mb-3">
            <input type="text" class="form-control" name="title" id="title" value="{{ $task->title }}">
            @error('title')
            <div class="text-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group w-50 mb-3">
            <textarea type="text" class="form-control" name="description" id="description">{{ $task->description}}</textarea>
            @error('description')
            <div class="text-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group w-50 mb-3">
            <input type="date" class="form-control" name="date" id="date" value="{{$task->date}}">
            @error('date')
            <div class="text-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <select class="form-select w-50 mb-3" aria-label="Default select example" name="status">
            <option selected value="0" hidden >Статус</option>
            <option value="Завершено" {{ $task->status == 'Завершено' ? 'selected' : '' }}>Завершено</option>
            <option value="Не завершено" {{ $task->status == 'Не завершено' ? 'selected' : '' }}>Не завершено</option>
        </select>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>

@endsection
