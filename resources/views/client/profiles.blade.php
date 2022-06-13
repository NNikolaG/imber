@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick-theme.css')}}">
@endpush
@section('content')
    <section class="companies-info">
        <div class="container">
            <div class="company-title">
                <h3>Find people</h3>
                <div class="search-bar">
                    <form>
                        <input type="text" name="search" placeholder="Search..." id="src">
                        <button><i class="la la-search"></i></button>
                    </form>
                </div><!--search-bar end-->
            </div><!--company-title end-->
            <div class="companies-list">
                <div class="row" id="profiles">
                    @include('client.partials.profiles-partials.for-profiles')
                </div>
            </div><!--companies-list end-->
        </div>
    </section><!--companies-info end-->
@endsection
@section('footer')
    @include('client.footer')
@endsection
