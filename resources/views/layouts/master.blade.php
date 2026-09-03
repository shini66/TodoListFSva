<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mi TodoList')</title>
    @stack('style')
</head>
<body>
    @include('layouts.partials.nav')
    <main>
        @yield('content')
    </main>
    <footer>&copy; {{ date('Y') }} - To-Do List</footer>
    @stack('scripts')
</body>
</html>
