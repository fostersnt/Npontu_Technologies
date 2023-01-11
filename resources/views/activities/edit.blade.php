@extends('layouts.super.Sidebar')

@section('title')
    <h3>Update Activity</h3>
@endsection

@section('content')
    <div id="update-activity">
        <form action="{{ Route('save-update') }}" method="POST">
            @csrf
                <div>
                    <input class="primary-input" type="text" name="id" value="{{ $activity->id }}" id="" hidden>
                </div>
                <div class="mb-3">
                    <label for="">Activity Name</label><br>
                    <input class="primary-input" type="text" name="name" value="{{ $activity->name }}" id=""><br>
                    @if ($errors->has('name'))
                        <span class="alert alert-danger p-0 mt-1">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Created By</label><br>
                    <input class="primary-input" type="text" name="creator" value="{{ $activity->created_by }}" id="" readonly><br>
                    @if ($errors->has('creator'))
                        <span class="alert alert-danger p-0 mt-1">{{ $errors->first('creator') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Status</label><br>
                    <select class="primary-input" name="status" id="">
                        <option value="">Select status...</option>
                        <option value="0">Pending</option>
                        <option value="1">Done</option>
                    </select><br>
                    @if ($errors->has('status'))
                        <span class="alert alert-danger p-0 mt-1">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="">Remarks</label><br>
                    <input class="primary-input" type="text" name="remarks" value="{{ $activity->remarks }}" id=""><br>
                    @if ($errors->has('remarks'))
                        <span class="alert alert-danger p-0 mt-1">{{ $errors->first('remarks') }}</span>
                    @endif
                </div>
                <button class="primary-btn" id="btn-activity">Update</button>
        </form>
    </div>
@endsection