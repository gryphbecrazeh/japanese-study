<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/vendor.css')) }}" data-turbolinks-track="true">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/main.css')) }}" data-turbolinks-track="true">

    <script type="text/javascript" src="{{ asset(mix('js/app.js')) }}" defer data-turbolinks-track="true"></script>
    <style>
        @import "tailwindcss/base";
        @import "tailwindcss/components";
        @import "tailwindcss/utilities";
        @import "tailwindcss";

    </style>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 ">
