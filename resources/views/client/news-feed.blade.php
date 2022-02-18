@extends('layouts.layout')

@section('content')

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">

                                @include('client.partials.user-data')
                                @include('client.partials.suggestions')

                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            @include('client.partials.post-topbar')

                            <div class="posts-section">

                                @include('client.partials.post')
                                @include('client.partials.top-profiles')
                                {{--                                @include('client.partials.comment-post')--}}

                            </div><!--posts-section end-->
                        </div><!--main-ws-sec end-->

                        <div class="col-lg-3 pd-right-none no-pd">
                            @include('client.partials.right-sidebar')
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>

    @include('client.partials.popup-post')

    <div class="chatbox-list">
        @include('client.partials.chatbox')
    </div><!--chatbox-list end-->

    </div><!--theme-layout end-->

@endsection
