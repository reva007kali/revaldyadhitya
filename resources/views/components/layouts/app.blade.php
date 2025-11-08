<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'CV Maker' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css">

    @filamentStyles


    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body class="">
    {{ $slot }}

    @livewire('notifications') {{-- Only required if you wish to send flash notifications --}}

    @filamentScripts
</body>

</html>
