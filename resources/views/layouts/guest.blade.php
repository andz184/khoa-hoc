<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
            }
            .form-control:focus {
                border-color: #8e44ad;
                box-shadow: 0 0 0 0.25rem rgba(142, 68, 173, 0.25);
            }
            .btn-primary {
                background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
                border: none;
                box-shadow: 0 4px 15px rgba(142, 68, 173, 0.4);
            }
            .btn-outline-primary {
                border-color: #8e44ad;
                color: #8e44ad;
            }
            .btn-outline-primary:hover {
                background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);
                border-color: #8e44ad;
                color: #fff;
            }
            a {
                color: #8e44ad;
            }
            a:hover {
                color: #9b59b6;
            }
            .icon {
                color: #8e44ad;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
