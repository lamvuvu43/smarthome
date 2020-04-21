@extends('welcome')
@section('control_led')
    {{--    --}}{{--    nhúng tiện ít button--}}
    {{--    <script type="text/javascript"--}}
    {{--            src="https://cdn.rawgit.com/Chalarangelo/bootstrap-extend/880420ae663f7c539971ded33411cdecffcc2134/js/bootstrap-extend.min.js"></script>--}}
    {{--    <link rel="stylesheet"--}}
    {{--          href="https://cdn.rawgit.com/Chalarangelo/bootstrap-extend/880420ae663f7c539971ded33411cdecffcc2134/css/bootstrap-extend.min.css"/>--}}
    {{--    --}}{{--    ------------------------------------------- --}}
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mt-3 mr-2 led">
                <label class="for">Đèn</label>
                <input type="range" min="0" max="10" name="led" id="led">
                <p></p>
            </div>
        </div>
    </div>
    <script>
        $('#led').change(function () {
            console.log($(this).val());
            $(this).parent().find("p").html($(this).val())
        })

    </script>
@endsection

