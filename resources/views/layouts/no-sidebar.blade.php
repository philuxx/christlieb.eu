<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('partials.navbar')
    <div class="container py-4">
        @include('flash::message')
        <div class="row">
            <main class="col-md-12">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<!-- Scripts -->
@include('partials.google_analytics')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>