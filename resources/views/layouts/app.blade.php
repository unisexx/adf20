<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('include/_meta')
    @stack('css')
</head>

<body>
    <div id="app">
        @include('include/_navbar')

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    @include('include/_js')
    @stack('js')
    {!! sweetAlert() !!}
</body>

</html>
