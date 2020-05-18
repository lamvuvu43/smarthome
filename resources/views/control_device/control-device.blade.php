@extends('welcome')
@section('pageTitle','Điều khiển thiết bị')
@section('control_device')
    @if(count($get_controller) == 0)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 title_status">
                <h1 style="color: #a71d2a;text-align: center;font-size: 25px">Hiện tại phòng này chưa có thiết
                    bị</h1>
            </div>
        </div>
    @endif
    <div class="row">


        @foreach($get_controller as $item)
            @if($item->device->device_type->max_value ==1)

                <div class="col-sm-12 col-md-6 col-lg- mt-2">
                    <div class="content-device" style="line-height: 30px">
                        <div class="checkbox">
                            <div class="his_control text-right "><a href="{{route('lis_his_devi',$item->id_devi)}}">Lịch sử điều khiển</a></div>
                            <label class="form-group"
                                   style="float: right">@if($item->name_con == null)  {{$item->id_devi}} @else  {{$item->name_con}}@endif
                            </label>
                            <input type="checkbox" data-toggle="toggle" data-on="Mở" data-off="Tắt"
                                   class="checkbox_input" data-id="{{$item->device->id_devi}}"
                                   data-id_con="{{$item->id_con}}">
                        </div>
                        @if($item->device->devi_value==1)
                            <script>
                                $('.checkbox_input').prop('checked', true);
                            </script>
                        @endif
                    </div>
                </div>
            @else
                @if($item->device->device_type->max_value != null)
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                        <div class="content-device">
                            <div class="his_control text-right  "><a href="{{route('lis_his_devi',$item->id_devi)}}">Lịch sử điều khiển</a></div>
                            <label for=""
                                   class="form-group">@if($item->name_con == null)  {{$item->id_devi}} @else  {{$item->name_con}}@endif</label>
                            <span style="float: right;margin-right: 5px" class="text-right"></span>
                            <input type="range" min="{{$item->device->device_type->min_value}}"
                                   max="{{$item->device->device_type->max_value}}" name="{{$item->id_device}}"
                                   class="form-control control_device slider input_range"
                                   value="{{$item->device->devi_value}}" data-id="{{$item->id_devi}}"
                                   data-id_con="{{$item->id_con}}">

                        </div>
                    </div>

                @else
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
                        <div class="content-device">
                            <label for=""
                                   class="form-group">@if($item->name_con == null)  {{$item->id_devi}} @else  {{$item->name_con}}@endif</label>
                            <span style="float: right;margin-right: 5px" class="text-right"></span>
                            <div>
                                {{$item->device->devi_value}}
                            </div>

                        </div>
                    </div>
                @endif
            @endif

        @endforeach
        <form action="{{route('mqtt')}}" method="GET" style="display: none" class="khongcantoi">
            <input id="id_devi_form" name="id_devi" value="">
            <input id="value_form" name="value" value="">
            <button type="submit" id="btn_submit">submit</button>
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
            var id_con = $(this).data('id_con');
            if ($(this).prop("checked") == true) {

                // console.log(id_con);

                $.get('../control_checkbox_process/' + id_con + '/' + 1, function (data) {
                    console.log(data);
                });

                // -----------------------send to server mqtt-------------------
                // $.get('http://127.0.0.1:8000/admin/mqtt?id_devi=' + id_device + '&value=' + 1, function (data) {
                //     console.log('connect success');
                // });
                $.ajax({
                    url:'{{route('mqtt')}}?id_devi=' + id_device + '&value=' + 1,
                    type:'GET',
                    success:function () {
                        console.log('Kết nối thành công');
                    },
                    error:function (e) {
                        alert(e.responseJSON.message);
                    }
                });

                // http://127.0.0.1:8000/admin/mqtt?id_devi=331035AAV012-01&value=1
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
                // $.get('http://127.0.0.1:8000/admin/mqtt?id_devi=' + id_device + '&value=' + 0, function (data) {
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
            var id_device = $(this).data('id');
            var id_con = $(this).data('id_con');
            console.log(value + '_' + id_device);
            $.get('../control_range_process/' + id_con + '/' + value, function (data) {
                console.log(data);
            });


            // $('#id_devi_form').val(id_device);
            // $('#value_form').val(value);
            // $('#btn_submit').click();
            // $.get('http://127.0.0.1:8000/admin/mqtt?id_devi=' + id_device + '&value=' + value, function (data) {
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

