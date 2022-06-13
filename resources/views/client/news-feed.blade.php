@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('assets/js/jquery.mCustomScrollbar.js')}}"></script>
    <script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/ajax.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
@endpush
@section('content')

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">

                                @include('client.partials.newsfeed-partials.newsfeed-user-data')
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            @include('client.partials.newsfeed-partials.newsfeed-post-topbar')
                            <div class="posts-section">
                                <div id="p-msg">
                                    @if(count($post) == 0)
                                        <h1 style="color: white">Follow someone or post something</h1>
                                    @endif
                                </div>
                                @foreach($post as $p)
                                    @if($loop->index == 1)
                                        @component('client.partials.newsfeed-partials.newsfeed-top-profiles',[
                                            "topProfiles"=>$topProfiles
])
                                        @endcomponent
                                    @endif
                                    @component('client.partials.post',[
                                        "post"=>$p
])
                                    @endcomponent
                                @endforeach
                            </div><!--posts-section end-->
                        </div><!--main-ws-sec end-->

                        <div class="col-lg-3 pd-right-none no-pd">
                            @include('client.partials.newsfeed-partials.newsfeed-right-sidebar')
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

    @include('client.partials.newsfeed-partials.popup-post')
    </div><!--theme-layout end-->

@endsection
