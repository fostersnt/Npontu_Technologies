@extends('layouts.super.Sidebar')

@section('title')
    <h3>Create Activity</h3>
@endsection

@section('content')
    <div id="create-activities">
        <form action="{{  Route('store-activity') }}" method="POST">
            @csrf
            <div class="mb-3">
                @if (Session::has('message'))
                    <span class="alert alert-success p-0">{{ session::get('message') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="">Activity Name</label><br>
                <input class="primary-input" type="text" value="{{ old('name') }}" name="name" id=""><br>
                @if ($errors->has('name'))
                    <span class="alert alert-danger p-0 mt-1 d-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-5" id="select-container">
                <label for="">Status</label><br>
                <select class="primary-input" id="select-field" name="status" id="">
                    <option value="">Select status...</option>
                    <option value="0">Pending</option>
                    <option value="1">Done</option>
                </select><br>
                @if ($errors->has('status'))
                    <span class="alert alert-danger p-0 mt-1 d-block">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <button class="primary-btn" id="btn-activity">Create</button>
        </form>
    </div>

    <!--
        
    <script type="text/javascript">
        document.getElementById('select-field').value = "{{ old('status') }}";
    </script>

    <script>
        $('#select-field')
                .change(my())

        var my = function() {
            alert('HELLO')
        }
    </script>

-->
@endsection