<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SKC - Management</title>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?c9qvqp08rwbxin5ukgwubtrb7f68kl0ebw7yn57y2138bnaw"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('_partials.nav.main-manage')
        @include('_partials.nav.manage')

        <div class="management-area" id="app">
            @include('_partials.notifications.messages')
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
