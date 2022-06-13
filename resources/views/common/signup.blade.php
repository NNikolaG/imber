<!DOCTYPE html>
<html>
<head>
    @include('common.head')
</head>


<body class="sign-in" oncontextmenu="return false;">


<div class="wrapper">

    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                                <img src="images\cm-logo.png" alt="">
                                <p>Workwise, is a global freelancing platform and social networking where businesses and
                                    independent professionals connect and collaborate remotely</p>
                            </div><!--cm-logo end-->
                            <img src="{{asset('assets/images/cm-main-img.png')}}" alt="">
                        </div><!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <ul class="sign-control">
                                <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                                <li data-tab="tab-4"><a href="#" title="">Contact</a></li>
                            </ul>

                            @include('client.partials.sign-partials.sing-in')

                            @include('client.partials.sign-partials.sing-up')

                            @include('client.partials.sign-partials.contact')
                        </div><!--login-sec end-->
                    </div>
                </div>
            </div><!--signin-pop end-->
        </div><!--signin-popup end-->
    </div><!--sign-in-page end-->
</div><!--theme-layout end-->
@include('common.scripts')
</body>
</html>
