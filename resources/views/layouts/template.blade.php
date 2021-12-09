<!DOCTYPE html>
<html lang="es-CO">
<head>
    <title>@yield('title')</title>
    @include('components.head')
</head>
<body>
    @yield('content')
    @include('components.footer')
</body>
</html>