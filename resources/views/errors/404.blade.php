@extends('layouts.general.app')

@section('content')
    <style>
        #my-error{
            min-height: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1{
            font-weight: bold;
            font-size: 100px;
        }
    </style>

    <div id="my-error">
        <h1>404</h1>
        <p>
            Sorry, the requested page cannot be found
        </p>
    </div>
@endsection