@extends('layouts.main')

@section('content')

    <h2 for="title">Добавить задачу</h2>
   <form action="{{route('todo.store')}}" method="post">
      @csrf
      <div class="form-group w-50 mb-3">
         <input type="text" class="form-control" name="title" id="title" placeholder="Название" value="{{ old('title') }}">
          @error('title')
          <div class="text-danger" role="alert">{{ $message }}</div>
          @enderror
      </div>
       <div class="form-group w-50 mb-3">
           <textarea type="text" class="form-control" name="description" id="description" placeholder="Описание">{{ old('description') }}</textarea>
           @error('description')
           <div class="text-danger" role="alert">{{ $message }}</div>
           @enderror
       </div>
       <div class="form-group w-50 mb-3">
           <input type="date" class="form-control" name="date" id="date" placeholder="Дата завершения" value="{{ old('date') }}">
           @error('date')
           <div class="text-danger" role="alert">{{ $message }}</div>
           @enderror
       </div>
       <select class="form-select w-50 mb-3" aria-label="Default select example" name="status" value="{{ old('status') }}">
           <option selected value="0" hidden >Статус</option>
           <option value="Завершено" {{ old('status') == 'Завершено' ? 'selected' : '' }}>Завершено</option>
           <option value="Не завершено" {{ old('status') == 'Не завершено' ? 'selected' : '' }}>Не завершено</option>
       </select>
      <button type="submit" class="btn btn-primary">Добавить</button>
   </form>

@endsection
