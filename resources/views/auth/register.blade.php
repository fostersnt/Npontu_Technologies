@extends('layouts.super.Sidebar')

@section('title')
    <h3>Register User</h3>
@endsection

@section('content')
    <div id="register-form-container">
        <form action="{{ Route('register-user') }}" method="POST">
            @csrf
            <div class="mb-4" style="color: orangered">
                <strong>Register User</strong>
            </div>
            <div class="mb-3">
                <label for="">First Name</label><br>
                <input type="text" class="primary-input" name="first_name" value="{{ old('first_name') }}" id=""><br>
                @if ($errors->has('first_name'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Last Name</label><br>
                <input type="text" class="primary-input" name="last_name" value="{{ old('last_name') }}" id=""><br>
                @if ($errors->has('last_name'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Email</label><br>
                <input type="text" class="primary-input" name="email" value="{{ old('email') }}" id="">
                @if ($errors->has('email'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Password</label><br>
                <input type="password" class="primary-input" name="password" value="{{ old('password') }}" id="">
                @if ($errors->has('password'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Status</label><br>
                <select class="primary-input" name="status" id="">
                    <option value="">Select User Status</option>
                    <option value="Support Engineer">Support Engineer</option>
                    <option value="Admin">Admin</option>
                </select>
                @if ($errors->has('status'))
                    <span class="alert alert-danger d-block p-0 mt-1">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <button type="submit" id="register-btn" class="mt-3 primary-btn">Register</button>
        </form>
    </div>
@endsection