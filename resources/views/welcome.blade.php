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
    <script src="{{asset("js/style_script_button.js")}}"></script>
</head>
<body>

{{--<div class="jumbotron text-center">--}}
{{--    <h1>My First Bootstrap Page</h1>--}}
{{--    <p>Resize this responsive page to see the effect!</p>--}}
{{--</div>--}}
@if (count($errors) > 0)
    <div class="modal_notification">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        $(function () {
            setTimeout(function () {
                $('#modal_notification').hide();
            }, 5000);
        })
    </script>
@endif
@if(Session::get('errorlogin'))
    <div class="alert alert-danger modal_notification">
        {{Session::get('errorlogin')}}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col- col-sm-6 col-md-6 col-lg-6 menu">
            <a class="active" href="#home">Nhà 1</a>
            <a href="#news">Nhà 2</a>
            <a href="#contact">Quản lý</a>
        </div>
        <div class="col- col-sm-6 col-md-6 col-lg-6 menu menu_login">
            <a href="#contact">Hỗ trợ</a>
            <a href="#news" data-toggle="modal" data-target="#registerModal" id="button_register">Đăng kí</a>
            <a data-toggle="modal" data-target="#loginModal" href="#home">Đăng nhập</a>
        </div>
    </div>
    <div class="row">
        <div class="col- col-sm-12 col-md-12 col-lg-12 header">
            <h2 class="text-center pt-3">Welcomee to Smart Home</h2>
            <p class="text-center font-weight-bold">Đơn giản, danh choáng, tiện lợi</p>
        </div>
    </div>
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:300px;height: 300px ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="text-center pb-4 pt-3 title_login">
                    <h4 class="modal-title">Đăng nhập</h4>
                </div>
                <form method="POST" action="{{ route('login_process') }}">
                    @csrf
                    <div class="modal_login text-center">
                        <div class="email_login pb-3">
                            <input type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="pass_login pb-3">
                            <input type="password" placeholder="*********" id="password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Quên mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="registerModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:300px;height: 300px ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="text-center pb-4 pt-3 title_register">
                    <h4 class="modal-title">Đăng kí tài khoản</h4>
                </div>
                <form action="{{route('register')}}"  method="POST">
                    @csrf
                    <div class="modal_login text-center">
                        <div class="username_register pb-3">
                            <input type="text" placeholder="Họ và tên" name="username_register">
                        </div>
                        <div class="phone_register pb-3">
                            <input type="text" placeholder="Số điện thoại" name="phone_register">
                        </div>
                        <div class="email_register pb-3">
                            <input type="text" placeholder="Email" name="email_register">
                        </div>
                        <div class="address_register pb-3">
                            <input type="text" placeholder="Địa chỉ:" name="address_register">
                        </div>
                        <div class="pass_register pb-3">
                            <input type="password" placeholder="*********" name="pass_register">
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success btn_register">Đăng kí</button>
                    </div>
                </form>
            </div>

        </div>
        {{--    </div>--}}
        @yield('control_led')
        @yield('show_room')
    </div>
</div>
<script>
    $(function () {
        setTimeout(function () {
            $('.modal_notification').hide();
        }, 5000);
    });
</script>
</body>
</html>
