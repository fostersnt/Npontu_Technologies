<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap">
    <!--Plugins-->
    <script src="{{ asset('/jQuery/jquery.min.js') }}"></script>
    <link href="{{ asset('/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/bootstrap/bootstrap.min.js') }}"></script>
    <!--My CSS & Scripts-->
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/js/navbar.js') }}"></script>
</head>

<div class="main-navbar">
    <!--Mobile menu-->
    <div id="mobile-menu">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!--Desktop navbar-->
    <div id="desktop-navbar">
        <li>
            <a href="{{ Route('home') }}" class="{{ Request::path()== '/' ? 'active-nav-link' : '' }}">Home</a>
        </li>
        <li class="{{ Request::path()== 'login' ? 'active' : '' }}">
            <a href="#">Contact Us</a>
        </li>
        @if (Auth::user() && auth()->user()->status == 'Admin')
        <li>
            <a href="{{ Route('registration-page') }}" class="{{ Request::path()== 'registration-page' ? 'active-nav-link' : '' }}">Register</a>
        </li>
        @endif
        @guest
        <li>
            <a href="{{ Route('login') }}" class="{{ Request::path()== 'login' ? 'active-nav-link' : '' }}">Login</a>
        </li>
        @else
        <li class="{{ Request::path()== 'logout' ? 'active-nav-link' : '' }}">
            <a href="{{ Route('logout') }}">Logout</a>
        </li>
        @endguest
    </div>
</div>


