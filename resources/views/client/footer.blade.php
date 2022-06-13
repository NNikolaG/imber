<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                @foreach($menu as $link)
                    <li><a href="{{route($link->route)}}" title="">{{$link->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div id="xex">
            <img class="fl-rgt" src="{{asset('assets/images/logo.png')}}" alt="logo2">
        </div>
    </div>
</footer>
