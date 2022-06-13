@extends('layouts.admin-layout')
@section('main')
    <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create new role</h4>
                    <form class="forms-sample" action="{{route('createRole')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="role_name"
                                       placeholder="Role Name">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-rounded btn-fw">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Roles</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Role Name</th>
                                <th> Edit</th>
                                <th> Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td> {{$role->role_name}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-info btn-fw edit-role"
                                                data-id="{{$role->role_id}}">
                                            <i class="mdi mdi-account-key"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{route('deleteRole')}}" method="POST">
                                            @csrf
                                            <input type="text" name="role_id" value="{{$role->role_id}}" hidden>
                                            <button type="submit" class="btn btn-warning btn-fw">
                                                <i class="mdi mdi-account-key"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" id="editing-role">Edit Role</h4>
                    <form class="forms-sample" action="{{route('updateRole')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" value="" name="role_id" id="updateME" hidden>
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Role Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="role_name"
                                       placeholder="Role Name" id="role-editor" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-rounded btn-fw">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
