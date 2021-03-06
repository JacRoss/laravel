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
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <div class="navbar-form navbar-right">
                    <div class="form-group">
                        <select id="search" class="form-control"></select>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">{{date('d-m-Y')}}</p>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#search').select2({
        placeholder: 'Поиск',
        width: 300,
        ajax: {
            url: '{{config('app.url')}}/api/articles/search',
            dataType: 'json',
            delay: 250,
            data: (params) => {
                return {query: params.term};
            },
            processResults: (data) => {
                return {results: data.data};
            },
            cache: true
        },
        minimumInputLength: 3,
        templateResult: (data) => data.title,
        templateSelection: selection
    });

    function selection(data) {
        if (data.id) {
            window.location = '{{config('app.url')}}/articles/' + data.id;
        }
    }
</script>
</body>
</html>
