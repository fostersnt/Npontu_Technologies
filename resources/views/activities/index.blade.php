@extends('layouts.super.Sidebar')

@section('title')
    <h3>Manage Activities</h3>
@endsection

@section('content')
    <div class="mb-3 mt-3">
        <form action="{{ Route('create-activity') }}">
            <button type="submit" class="primary-btn" style="width: 100px">Add Activity</button>
        </form>
    </div>
    
        @if (Session::has('message'))
            <span class="mt-3 mb-3 d-block alert alert-success">{{ Session::get('message') }}</span>
        @endif
    
    <div>
        <table class="table table-responsive" id="activities-table">
            <thead>
                <th>Activity Name</th>
                <th>Creator</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($data as $activity)
                @php
                    $my_status = '';
                    if ($activity->activity_status == 0)
                       {
                        $my_status = 'Pending';
                       }
                    else 
                        {
                            $my_status = 'Done';
                        }
                @endphp
                    <tr>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->created_by }}</td>
                        <td>{{ $my_status }}</td>
                        <td>{{ $activity->remarks }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="primary-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li>
                                    <a class="dropdown-item" href="{{ url('edit-activity/' . $activity->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="{{ url('delete-activity/'. $activity->id) }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </a>
                                  </li>
                                </ul>
                              </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $('#activities-table').dataTable();
    </script>
@endsection