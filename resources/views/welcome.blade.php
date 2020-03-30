<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="{{asset('css/home_page.css')}}" rel="stylesheet">
{{--    nhúng tiện ít button--}}
    <script type="text/javascript" src="https://cdn.rawgit.com/Chalarangelo/bootstrap-extend/880420ae663f7c539971ded33411cdecffcc2134/js/bootstrap-extend.min.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/bootstrap-extend/880420ae663f7c539971ded33411cdecffcc2134/css/bootstrap-extend.min.css"/>
{{--    ------------------------------------------- --}}
    <script src="{{asset("js/style_script_button.js")}}"></script>
</head>
<body>

{{--<div class="jumbotron text-center">--}}
{{--    <h1>My First Bootstrap Page</h1>--}}
{{--    <p>Resize this responsive page to see the effect!</p>--}}
{{--</div>--}}

<div class="container">
    <div class="row">
        <div class="col- col-sm-12 col-md-12 col-lg-12 menu">
            <a class="active" href="#home">Nhà 1</a>
            <a href="#news">Nhà 2</a>
            <a href="#contact">Quản lý</a>
        </div>
    </div>
    <div class="row">
        <div class="col- col-sm-12 col-md-12 col-lg-12 header">
            <h2 class="text-center pt-3">Welcomee to Smart Home</h2>
            <p class="text-center font-weight-bold">Đơn giản, danh choáng, tiện lợi</p>
        </div>
    </div>
    @yield('control_led')
    @yield('show_room')
</div>

</body>
</html>
