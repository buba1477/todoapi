<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container mt-5">
    <ul class="nav">
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('todo.index') }}">Список задач</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('todo.create') }}">Создать задачу</a>
        </li>
        <li class="nav-item ">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <button type="submit" class="btn btn-link">Выход</button>

            </form>
        </li>
    </ul>

<main class="py-4">
    @yield('content')
</main>
</div>
</body>
</html>
