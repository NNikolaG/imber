@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('assets/js/ajax.js')}}"></script>
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
    <section class="profile-account-setting">
        <div class="container">
            <div class="account-tabs-setting">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="acc-leftbar">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach($chats as $chat)
                                    <a class="nav-item nav-link msgBox" id="nav-{{str_replace(' ', '', strtolower($chat->username))}}-tab"
                                       data-toggle="tab"
                                       href="#nav-{{str_replace(' ', '', strtolower($chat->username))}}"
                                       role="tab" aria-controls="nav-{{str_replace(' ', '', strtolower($chat->username))}}" aria-selected="false" data-idt="{{session()->get('user')->user_id}}" data-idx="{{$chat->user_id}}">
                                        <li>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img
                                                        src="{{asset('storage/profileImages/'.$chat->profile_pic)}}"
                                                        alt="profile">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3>{{$chat->username}}</h3>
                                                </div><!--usr-mg-info end-->
                                            </div><!--usr-msg-details end-->
                                        </li>
                                    </a>
                                @endforeach
                            </div>
                        </div><!--acc-leftbar end-->
                    </div>
                    <div class="col-lg-9" id="chatBox">
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($chats as $chat)
                                @component('client.partials.chat', ['chat'=> $chat, 'index'=>$loop->index])
                                @endcomponent
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!--account-tabs-setting end-->
        </div>
    </section>
@endsection
@section('footer')
    @include('client.footer')
@endsection
