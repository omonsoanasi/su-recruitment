<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Strathmore University') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">
        <style>
            .social-icons {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 4rem;
                padding: 1rem;
            }

            .social-icons a {
                margin: 0 0.5rem;
                font-size: 2rem;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
                {{ $slot }}
    </body>
</html>
