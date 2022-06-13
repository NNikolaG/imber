<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="{{route($menu[0]->route)}}" title=""><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
            </div><!--logo end-->
            <nav>
                <ul>
                    @foreach($menu as $link)
                        @if($link->name == 'Author')
                            @continue
                        @endif
                        <li>
                            <a href="{{route($link->route)}}" title="">
                                    <span><img src="{{asset('assets/images/'.$link->icon)}}"
                                               alt="{{$link->alttag}}"></span>
                                {{$link->name}}
                            </a>
                        </li>
                    @endforeach
                    @if(session()->get('user')->role_id == 2)
                            <li>
                                <a href="{{route('accountCtrl')}}" title="">
                                    <span><img src="{{asset('assets/images/icon3.png')}}"
                                               alt="admin"></span>
                                    Admin Panel
                                </a>
                            </li>
                    @endif
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <a href="#" title="">{{session()->get('user')->username}} </a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss" id="users">
                    <ul class="us-links">
                        <li>
                            <a href="{{route('profiles.show', session()->get('user')->username)}}" title="">View
                                Profile</a>
                        </li>
                        <li><a href="{{route('settings', session()->get('user')->username)}}" title="">Account
                                Settings</a>
                        </li>
                        <li>
                            <a href="{{route('signout')}}" title="">Sign Out</a>
                        </li>
                    </ul>
                </div><!--user-account-settingss end-->
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->
