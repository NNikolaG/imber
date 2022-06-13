@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('assets/js/jquery.mCustomScrollbar.js')}}"></script>
    <script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollbar.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
@endpush
@section('content')
    <section class="Company-overview">
        <div class="container">
            <div class="row flex">
                <div class="col-md-4 col-sm-12">
                    <h2 id="h">
                        Nikola Gutić
                    </h2>
                    <p class="bio">
                        I am studying at the College of Information and Communication Technologies, majoring in Internet
                        Technology and I enjoy everything this college has to offer.
                    </p>
                    </br>
                    <p class="bio">Some of previous projects</p>
                    </br>
                    <ul>
                        <li><a target="_blank" class="bio" href="https://nikola-wp2.netlify.app/">Shimmer</a></li>
                        <li><a target="_blank" class="bio" href="https://nikola-wp-1.netlify.app/">NIIC</a></li>
                        <li><a target="_blank" class="bio" href="https://nikola-gutic-ispit.netlify.app/">Komorebi</a></li>
                    </ul>
                    </br>
                    <p><a target="_blank" class="bio" href="{{asset('dokumentacija.pdf')}}">Documentation</a></p>
                </div>
                <div class="col-md-4 col-sm-6 author">
                    <img src="{{asset('assets/images/author.jpeg')}}" alt="image">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    @include('client.footer')
@endsection
