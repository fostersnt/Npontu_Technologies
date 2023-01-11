@extends('layouts.super.Sidebar')

@section('title')
    <h3>Users</h3>
@endsection

@section('content')
    <div>
        <a class="btn primary-btn mb-3" id="add-user" href="{{ Route('registration-page') }}">Add User</a>
        
            @if (Session::has('message'))
                <span class="mt-3 mb-3 d-block alert alert-success">{{ Session::get('message') }}</span>
            @endif
        
        <table class="table table-responsive" id="users_table">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="primary-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="{{ url('delete-user/'. $user->id) }}">
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
        $(function(){
            $('#users_table').dataTable();
        })
    </script>
@endsection