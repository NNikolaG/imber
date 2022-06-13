@extends('layouts.layout')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>
@endpush
@push('scripts')
    <script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
@endpush

@section('content')
    <section class="cover-sec"
             style='background-image: url("{{asset('storage/covers/'.$user->background)}}")'>
    </section>
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            @include('client.partials.profile-partials.profile-left-sidebar')
                        </div>
                        <div class="col-lg-6">
                            @include('client.partials.profile-partials.profile-feed-tabs')
                        </div>
                        <div class="col-lg-3">
                            @include('client.partials.profile-partials.profile-right-sidebar')
                        </div>
                    </div>
                </div><!-- main-section-data end-->

            </div>
        </div>
    </main>
@endsection
