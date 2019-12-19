<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('include/_meta')
</head>

<body>
    <div id="app">
        @include('include/_navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('include/_js')
</body>

</html>
