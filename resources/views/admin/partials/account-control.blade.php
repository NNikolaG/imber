@extends('layouts.admin-layout')
@section('main')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Registrated Accounts</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th> Username</th>
                                <th> Email</th>
                                <th> Role</th>
                                <th> Active / Deactivated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $acc)
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td> {{$acc->username}}</td>
                                    <td>
                                        {{$acc->email}}
                                    </td>
                                    <td>
                                        @if($acc->role_id == 2)
                                            <form action="{{route('roleUpdate', $acc->user_id)}}" method="POST">
                                                @csrf
                                                <input type="text" name='role_id' value="{{$acc->role_id}}" hidden>
                                                <button type="submit" class="btn btn-info btn-fw">
                                                    <i class="mdi mdi-account-key"></i> Admin
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{route('roleUpdate', $acc->user_id)}}" method="POST">
                                                @csrf
                                                <input type="text" name='role_id' value="{{$acc->role_id}}" hidden>
                                                <button type="submit" class="btn btn-warning btn-fw">
                                                    <i class="mdi mdi-account"></i> User
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($acc->active == 0)
                                        <form action="{{route('status', $acc->user_id)}}" method="POST">
                                            @csrf
                                            <input type="text" name='status' value="{{$acc->active}}" hidden>
                                            <button type="submit" class="btn btn-success btn-icon-text">
                                                <i class="mdi mdi-emoticon"></i> Active
                                            </button>
                                        </form>
                                        @else
                                            <form action="{{route('status', $acc->user_id)}}" method="POST">
                                                @csrf
                                                <input type="text" name='status' value="{{$acc->active}}" hidden>
                                                <button type="submit" class="btn btn-danger btn-icon-text">
                                                    <i class="mdi mdi-emoticon-neutral"></i> Deactivated
                                                </button>
                                            </form>
                                        @endif
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
@endsection
