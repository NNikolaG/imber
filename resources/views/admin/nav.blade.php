<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{route('home.index')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo"/></a>
        <a class="sidebar-brand brand-logo-mini"><img src="{{asset('storage/profileImages/'. session()->get('user')->profile_pic)}}"
                                                                        alt="logo"/></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{asset('storage/profileImages/'. session()->get('user')->profile_pic)}}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{session()->get('user')->username}}</h5>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('accountCtrl')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Account Control</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('roleEdit')}}">
              <span class="menu-icon">
                <i class="mdi mdi-ghost"></i>
              </span>
                <span class="menu-title">Role Edit</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('navEdit')}}">
              <span class="menu-icon">
                <i class="mdi mdi-ghost"></i>
              </span>
                <span class="menu-title">Nav Link Edit</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('logs')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Logs</span>
            </a>
        </li>
    </ul>
</nav>
