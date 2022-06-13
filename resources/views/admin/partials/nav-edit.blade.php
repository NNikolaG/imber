@extends('layouts.admin-layout')
@section('main')
    <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create new role</h4>
                    <form class="forms-sample" action="{{route('createNav')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nav Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name"
                                       placeholder="Nav Link Name">
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nav Route</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="route"
                                       placeholder="Nav Link Route">
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nav Alttag</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alttag"
                                       placeholder="Nav Link Alttag">
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
                                <th> Nav Link Name</th>
                                <th> Nav Link Route</th>
                                <th> Edit</th>
                                <th> Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menu as $link)
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td> {{$link->name}}</td>
                                    <td> {{$link->route}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-info btn-fw edit-nav"
                                                data-id="{{$link->navlink_id}}">
                                            <i class="mdi mdi-account-key"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{route('deleteNav')}}" method="POST">
                                            @csrf
                                            <input type="text" name="navlink_id" value="{{$link->navlink_id}}" hidden>
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
                    <h4 class="card-title" id="editing-nav">Edit Nav Link</h4>
                    <form class="forms-sample" action="{{route('updateNav')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" value="" name="navlink_id" id="updateMe" hidden>
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nav Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="nav-name"
                                       placeholder="Nav Link Name" disabled>
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nav Route</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="route" id="nav-route"
                                       placeholder="Nav Link Route" disabled>
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nav Alttag</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alttag" id="nav-tag"
                                       placeholder="Nav Link Alttag" disabled>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-rounded btn-fw">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
