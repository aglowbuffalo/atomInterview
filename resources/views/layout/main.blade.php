<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>php_variable</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-4">
            <ul class="flex items-center">
                <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
            </ul>
            <ul class="flex items-center">
                <li><a href="{{ route('contact') }}" class="p-3">Contact Us</a></li>
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
