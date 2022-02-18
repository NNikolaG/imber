
<!DOCTYPE html>
<html>
<head>
    @include('common.head')
</head>

<body oncontextmenu="return false;">

<div class="wrapper">

    @include('common.header')

    @yield('content')

    @include('common.scripts')
</body>
</html>
