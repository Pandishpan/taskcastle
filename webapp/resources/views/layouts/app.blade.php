<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Code Challange</title>

    <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>

<div class="container-fluid" id="app">
    <div class="row">
        <div class="col-12 col-sm-4 col-xl-3 mb-3" id="instructions">
            <h2>Instructions</h2>

            <p>Good work getting the app running. Now onto some coding!</p>

            <task-list></task-list>

            <p class="mb-0"><b>Resources</b></p>

            <ul class="list-unstyled">
                <li><a href="https://laravel.com/docs/6.x">Laravel</a></li>
                <li><a href="https://vuejs.org/v2/guide/">VueJS</a></li>
                <li><a href="https://getbootstrap.com/docs/4.3">Bootstrap</a></li>
                <li><a href="https://api.exchangeratesapi.io/latest?base=GBP">Exchange rates API</a></li>

            </ul>
        </div>
        <div class="col-12 col-sm-8 col-xl-9">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
