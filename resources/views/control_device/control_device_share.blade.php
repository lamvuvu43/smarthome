@extends('welcome')
@section('pageTitle','Điều khiển thiết bị được chia sẻ')
@section('control_device')

    <div class="row">

            @if($get_con->device->device_type->max_value ==1)

                <div class="col-sm-12 col-md-6 col-lg- mt-2">
                    <div class="content-device" style="line-height: 80px">
                        <div class="checkbox">
                            <label class="form-group"
                                   style="float: right">@if($get_con->name_con == null)  {{$get_con->id_devi}} @else  {{$get_con->name_con}}@endif</label>
                            <input type="checkbox" data-toggle="toggle" data-on="Mở" data-off="Tắt"
                                   class="checkbox_input" data-id="{{$get_con->device->id_devi}}" data-id_con="{{$get_con->id_con}}">
                        </div>
                        @if($get_con->device->devi_value==1)
                            <script>
                                $('.checkbox_input').prop('checked', true);
                            </script>
                        @endif
                    </div>
                </div>
            @else
                @if($get_con->device->device_type->max_value != null)
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                        <div class="content-device">
                            <label for=""
                                   class="form-group">@if($get_con->name_con == null)  {{$get_con->id_devi}} @else  {{$get_con->name_con}}@endif</label>
                            <span style="float: right;margin-right: 5px" class="text-right"></span>
                            <input type="range" min="{{$get_con->device->device_type->min_value}}"
                                   max="{{$get_con->device->device_type->max_value}}" name="{{$get_con->id_device}}"
                                   class="form-control control_device slider input_range"
                                   value="{{$get_con->device->devi_value}}" data-id="{{$get_con->id_devi}}" data-id_con="{{$get_con->id_con}}">

                        </div>
                    </div>

                @else
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                        <div class="content-device">
                            <label for=""
                                   class="form-group">@if($get_con->name_con == null)  {{$get_con->id_devi}} @else  {{$get_con->name_con}}@endif</label>
                            <span style="float: right;margin-right: 5px" class="text-right"></span>
                            <div>
                                {{$get_con->device->devi_value}}
                            </div>

                        </div>
                    </div>
                @endif
            @endif


        <form action="{{route('mqtt')}}" method="GET" style="display: none" class="khongcantoi">
            <input id="id_devi_form" name="id_devi" value="">
            <input id="value_form" name="value" value="">
            <button type="submit" id="btn_submit" >submit</button>
        </form>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
        $('.control_device').change(function () {
            // console.log($(this).val());
            $(this).parent().find("span").show();
            $(this).parent().find("span").html($(this).val())
            $(this).parent().find("span").hide(1000);

        })
        $('.checkbox_input').change(function () {
            var id_device = $(this).data('id');
            var id_con= $(this).data('id_con');
            if ($(this).prop("checked") == true) {

                // console.log(id_con);

                $.get('../control_checkbox_process/' + id_con + '/' + 1, function (data) {
                    console.log(data);
                })
                // -----------------------send to server mqtt-------------------
                // $.get('http://127.0.0.1:8000/admin/mqtt?id_devi=/'+id_device+'/&value='+1,function (data) {
                //     console.log('connect success');
                // })

                $.ajax({
                    url:'{{route('mqtt')}}?id_devi=' + id_device + '&value=' + 1,
                    type:'GET',
                    success:function () {
                        console.log('Kết nối thành công');
                    },
                    error:function (e) {
                        alert(e.responseJSON.message);
                    }
                })
                // ----------------------------------------------------------------
                // $('#id_devi_form').val(id_device);
                // $('#value_form').val('1');
                // $('#btn_submit').click();
            } else if ($(this).prop("checked") == false) {
                console.log("không check");

                $.get('../control_checkbox_process/' + id_con + '/' + 0, function (data) {
                    console.log(data);
                });
                // -----------------------send to server mqtt-------------------
                // $.get('http://127.0.0.1:8000/admin/mqtt?id_devi=/'+id_device+'/&value='+0, function (data) {
                //     console.log('connect sucess');
                // });

                $.ajax({
                    url:'{{route('mqtt')}}?id_devi=' + id_device + '&value=' + 0,
                    type:'GET',
                    success:function () {
                        console.log('Kết nối thành công');
                    },
                    error:function (e) {
                        alert(e.responseJSON.message);
                    }
                })

                // -----------------------send to server mqtt-------------------
                // $('#id_devi_form').val(id_device);
                // $('#value_form').val('0');
                // $('#btn_submit').click();
            }

        })
        $('.input_range').change(function () {
            var value = $(this).val();
            var id_device=$(this).data('id');
            var id_con= $(this).data('id_con');
            console.log(value + '_'+id_device);
            $.get('../control_range_process/' + id_con + '/' + value, function (data) {
                console.log(data);
            });


            // $('#id_devi_form').val(id_device);
            // $('#value_form').val(value);
            // $('#btn_submit').click();
            // $.get('http://127.0.0.1:8000/admin/mqtt?id_devi=/'+id_device+'/&value='+value, function (data) {
            //     console.log('connect sucess');
            // });

            $.ajax({
                url:'{{route('mqtt')}}?id_devi=' + id_device + '&value=' + value,
                type:'GET',
                success:function () {
                    console.log('Kết nối thành công');
                },
                error:function (e) {
                    alert(e.responseJSON.message);
                }
            })
        })
    </script>
@endsection

