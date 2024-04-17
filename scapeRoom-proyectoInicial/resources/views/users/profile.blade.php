@extends('adminlte::page')

@section('title', 'User Profile')

@section('content_header')
    <h1 class="text-center"><b>User Profile</b></h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="userDetailsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ optional($user->role)->nom() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('user.list') }}" class="btn btn-primary">Back to Users List</a>
        </div>
    </div>
</div>
@stop
