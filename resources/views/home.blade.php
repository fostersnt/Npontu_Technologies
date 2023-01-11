@extends('layouts.general.app')

@section('content')
<style>
    #home-page{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<div id="home-page">
    <h1 class="">INSTRUCTIONS<h1>
    <h1>
        {{ $current_time }}
    </h1>
    <div>
        <h3>Pre-requisites</h3>
        <li>Xampp & apache server</li><br>
        <h3>How to run the application</h3>
        <p>Follow the steps below to run the application</p>
        <li>Step 1: Create a database with the name 'npontu_technologies'</li>
        <li>Step 2: Import the database file which is included in the root directory of this app</li>
        <li>The included database is named 'npontu_technologies'</li>
        <h3>User login details</h3>
        <li>E-mail: <strong>developer@gmail.com</strong></li>
        <li>Password: <strong>developer</strong></li>
    </div>
</div>
@endsection