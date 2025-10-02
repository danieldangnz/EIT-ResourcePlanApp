<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TIGrS App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="headerButtons">
        <a href="#" class="headerBtn">Help</a>
        <a href="#" class="headerBtn">Email</a>

        @auth
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="headerBtn">Logout</button>
        </form>
        @endauth
    </div>
</header>
