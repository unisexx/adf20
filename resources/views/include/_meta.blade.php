<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
<style>
* {
 font-size: 100%;
 font-family: 'Kanit', sans-serif;
}
</style>

<!-- Styles -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="{{ asset('MDB-Pro-4.9.0/MDB-Pro/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('MDB-Pro-4.9.0/MDB-Pro/css/mdb.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/template.css') }}">
