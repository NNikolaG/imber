@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('assets/js/jquery.mCustomScrollbar.js')}}"></script>
    <script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>
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
                                <a class="nav-item nav-link active" id="nav-password-tab" data-toggle="tab"
                                   href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i
                                        class="fa fa-lock"></i>Change Password</a>
                                <a class="nav-item nav-link" id="nav-privacy-tab" data-toggle="tab" href="#privacy"
                                   role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Account
                                    Support</a>
                                <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab"
                                   href="#nav-deactivate" role="tab" aria-controls="nav-deactivate"
                                   aria-selected="false"><i class="fa fa-random"></i>Deactivate Account</a>
                            </div>
                        </div><!--acc-leftbar end-->
                    </div>
                    <div class="col-lg-9">

                        <div class="tab-content" id="nav-tabContent">

                            @component('client.partials.account-settings.password-reset')
                            @endcomponent

                            @component('client.partials.account-settings.account-support', [
                                'user'=>$user
])
                            @endcomponent

                            @component('client.partials.account-settings.deactivate-account')
                            @endcomponent

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
