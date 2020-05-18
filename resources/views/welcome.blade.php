<!DOCTYPE html>
<html lang="en">
<head>
    <title>SmartHome @yield('pageTitle')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    {{--    -------------------------dotnetwork-------------------------------}}
    <link rel="stylesheet" media="screen" href="{{asset('css/style_dotnetwork.css')}}">
    {{--    =================================================================================================--}}
    <link href="{{asset('css/home_page.css')}}" rel="stylesheet">
    <script src="{{asset("js/style_script_button.js")}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
{{--    ------auto complete------}}
<!-- jQuery library -->
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

<!-- jQuery UI library -->
    <link rel="stylesheet" href="{{asset('js/jquery-ui.css')}}">
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
</head>
<body>
{{--@if(Auth::check()==false)--}}
{{--    <meta http-equiv="refresh" content="0;url=/home">--}}
{{--@endif--}}

<div class="count-particles">
    <span class="js-count-particles">--</span> particles
</div>
<!-- particles.js container -->
<div id="particles-js" style="z-index: -1;">
</div>

{{--<div class="jumbotron text-center">--}}
{{--    <h1>My First Bootstrap Page</h1>--}}
{{--    <p>Resize this responsive page to see the effect!</p>--}}
{{--</div>--}}

<div class="container">
    <?php



    $MAC = exec('getmac');

    $MAC = strtok($MAC, ' ');

    //    echo "MAC address of client is: $MAC";
    ?>


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
    @if (Session::get('register_successful'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('register_successful') }}
        </div>
    @endif
    @if(Session::get('errorlogin'))
        <div class="alert alert-danger modal_notification">
            {{Session::get('errorlogin')}}
        </div>
    @endif
    {{--        -----------------------------------------------------------------------------}}
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 menu">
            @if(Auth::check()==true)
                {{--                <a class="active" href="#home">Nhà 1</a>--}}
                {{--                <a href="#news">Nhà 2</a>--}}
                <a id="goback" style="display: none;"><i class="fa fa-undo" aria-hidden="true"></i></a>
                <a href="{{route('list_home')}}"><i class="fa fa-home" aria-hidden="true"></i></i>
                </a>
                <a href="#contact" id="show_button_add">Quản lý</a>
            @endif()
            <a id="button_show_menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <div class="div_button_add">
{{--                <a class="button_add " href="{{route('add_home')}}">Thêm nhà</a>--}}
{{--                <a class="button_add " href="{{route('create_floor')}}">Thêm tầng</a>--}}
{{--                <a class="button_add" href="{{route('show_form_room')}}">Thêm phòng </a>--}}
                <a class="button_add" href="{{route('add_device.show')}}">Thêm thiết bị</a>
                <a class="button_add" href="{{route('list_device.show')}}">Danh sách thiết bị</a>
                <a class="button_add" href="{{route('list_house.show')}}">Danh sách ngôi nhà</a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 menu menu_login">
            <a href="{{route('list_con_his')}}">Lịch sử điều khiển</a>
            @if(Auth::check()==true)
                <a style="text-transform: uppercase;"
                   id="show_button_logout">{{Auth::user()->last_name}} {{Auth::user()->full_name}}</a>
            @else
                <a href="#news" data-toggle="modal" data-target="#registerModal" id="button_register">Đăng kí</a>
                <a data-toggle="modal" data-target="#loginModal" href="#home" id="show_modal_login">Đăng nhập</a>
            @endif
            <div class="">
                <a class="btn btn-link button_logout" href="{{route('logout')}}" style="display: none">Đăng xuất</a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col- col-sm-12 col-md-12 col-lg-12 header">
            <h2 class="text-center pt-3 pb-3">Welcomee to Smart Home</h2>
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" value="<?php echo $MAC ?>" name="mac" hidden>
                    <div class="modal_login text-center">
                        <div class="email_login pb-3">
                            <label class="lable_login">Email</label>
                            <input type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="pass_login pb-3">
                            <label class="lable_login">Mật khẩu</label>
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
                        {{--                        <button type="button" class="btn btn-default">Quên mật khẩu</button>--}}
                        <a class="btn btn-default" href="{{ route('password.request') }}">
                            Quên mật khẩu
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="registerModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:400px;height: 300px ">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="text-center pb-4 pt-3 title_register">
                    <h4 class="modal-title">Đăng kí tài khoản</h4>

                </div>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="modal_login text-center">
                        <p style="font-weight: bold;float: left;text-decoration: underline;" class="pb-3"> Có <span
                                style="color: red;">*</span> là bắt buộc</p>
                        <div class="email_register pb-3">
                            <label class="lable_register" for="email_register">Email <span
                                    style="color: red;float: right" class="pr-3">*</span></label>
                            <input type="email" placeholder="Email" name="email_register" id="email_register"
                                   required="" value="{{old('email_register')}}"
                                   oninvalid="this.setCustomValidity('Email không được trống')"
                                   oninput="setCustomValidity('')">
                            @error('email_register')
                            <script>
                                $('#button_register').click();
                            </script>
                            @enderror
                        </div>
                        <div class="pass_register pb-3">
                            <label class="lable_register" for="pass_register"> Mật khẩu <span
                                    style="color: red;float: right" class="pr-3">*</span></label>
                            <input type="password" placeholder="*********" name="pass_register" id="pass_register"
                                   required=""
                                   oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')"
                                   oninput="setCustomValidity('')">
                        </div>
                        <div class="username_register pb-3">
                            <label class="lable_register" for="username_register">Họ và tên <span
                                    style="color: red;float: right" class="pr-3">*</span></label>
                            <input type="text" placeholder="Họ và tên" name="username_register" id="username_register"
                                   value="{{old('username_register')}}"
                                   required="" oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')"
                                   oninput="this.setCustomValidity('')">
                        </div>
                        <div class="phone_register pb-3">
                            <label class="lable_register" for="phone_register">Số điện thoại <span
                                    style="color: red;float: right" class="pr-3">*</span></label>
                            <input type="text" placeholder="Số điện thoại" name="phone_register" id="phone_register"
                                   value="{{old('phone_register')}}"
                                   required="" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')"
                                   oninput="this.setCustomValidity('')">
                            @error('phone_register')
                            <script>
                                $('#button_register').click();
                            </script>
                            @enderror
                        </div>

                        <div class="address_register pb-3">
                            <label class="lable_register" for="address_register">Địa chỉ</label>
                            <input type="text" placeholder="Địa chỉ:" name="address_register" id="address_register"
                                   value="{{old('address_register')}}">
                            @error('address_register')
                            <script>
                                $('#button_register').click();
                            </script>
                            @enderror
                        </div>


                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success btn_register">Đăng kí</button>
                    </div>
                </form>
            </div>

        </div>
        {{--    </div>--}}

    </div>
    @yield('control_device')
    @yield('show_room')
    @yield('form_add_home')
    @yield('form_add_room')
    @yield('list_home')
    @yield('list_floor')
    @yield('add_device')
    @yield('list_device')
    @yield('edit_device')
    @yield('list_device_share')
    @yield('show_form_share')
    @yield('form_edit_device_share')
    @yield('list_house')
    @yield('edit_house')
    @yield('list_floor_edit')
    @yield('edit_floor')
    @yield('list_room_edit')
    @yield('edit_room')
    @yield('list_con_his')
    @yield('create_floor')
</div>
<script>
    $(function () {
        setTimeout(function () {
            $('.modal_notification').hide(200);
        }, 5000);
    });

    $('#button_show_menu').click(function () {
        $('.menu_login').toggle(500);
    });
    $('#show_button_logout').click(function () {
        $('.button_logout').toggle(200);
    })
    $('#show_button_add').click(function () {
        $('.button_add ').toggle()
    })
    // ---------------------ẩn biểu đồ dotnetwork----------------------
    $(function () {
        $('#fps').hide();
    })
    $('#goback').click(function () {
        window.history.back();
    });
    $('.add_function').mouseover(function () {
        $(this).parent().find('.note_btn').show(500);
    });
    $(document).on('mouseover','.add_function',function () {
        $(this).parent().find('.note_btn').show(500);
    })
</script>
@if(Auth::check()==false)
    @if(count($errors)==0)

        <script>
            // $('#show_modal_login').click();
        </script>
    @endif
@endif
{{------------------------------dotnetwork----------------------------------}}
<script src="{{asset('js/particles.js')}}"></script>
<script src="{{asset('js/app_dotnetwork.js')}}"></script>
<script src="{{asset('js/lib/stats.js')}}"></script>
<script>
    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function () {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
</script>
{{--------------------------------------------------------}}
</body>
</html>
