<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{route('home.index')}}"><img
                src="{{asset('assets/images/logo.png')}}"
                alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <ul class="navbar-nav w-100">
            <li class="nav-item w-50">
            <a class="nav-link" href="{{route('home.index')}}">
                    <i class="mdi mdi-view-grid"></i>
                    Home
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>
