@extends('layouts.admin-layout')
@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">Search by date</p>
                <input type="date" id="date" name="date">
                <button type="button" class="btn btn-info btn-rounded btn-fw" id="filter">Filter</button>
            </div>
        </div>
    </div>
    <div id="logs-table">
        @include('admin.partials.logs-table-partial')
    </div>
@endsection
