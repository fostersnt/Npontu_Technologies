@extends('layouts.general.app')

@section('content')

    <div id="login-container">
        <form action="{{ Route('login-check') }}" id="login-form" method="POST">
            @csrf
            <div class="mb-5">
                <h3 class="mute">Application Support</h3>
            </div>
            <div class="md-3">
                @if (session()->has('success'))
                    <span class="alert alert-success p-0 d-block">{{ session()->get('success') }}</span>
                @endif
            </div>
            <div class="md-3">
                @if (session()->has('error'))
                    <span class="alert alert-danger p-0 d-block">{{ session()->get('error') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="">E-mail</label><br>
                <input class="primary-input" type="text" name="email" id=""><br>
                @if ($errors->has('email'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-2">
                <label for="">Password</label><br>
                <input class="primary-input" type="password" name="password" id=""><br>
                @if ($errors->has('password'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div id="forgot-password"><a href="#">Forgot Password?</a></div>
            <button type="submit" id="login-btn" class="mt-3 primary-btn">Login</button>
        </form>
    </div>

@endsection
