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
                    <div class="content-device" style="line-height: 80px">
                        <div class="checkbox">
                            <label class="form-group"
                                   style="float: right">@if($item->name_con == null)  {{$item->id_devi}} @else  {{$item->name_con}}@endif</label>
                            <input type="checkbox" data-toggle="toggle" data-on="Mở" data-off="Tắt"
                                   class="checkbox_input" data-id="{{$item->device->id_devi}}">
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
                            <label for=""
                                   class="form-group">@if($item->name_con == null)  {{$item->id_devi}} @else  {{$item->name_con}}@endif</label>
                            <span style="float: right;margin-right: 5px" class="text-right"></span>
                            <input type="range" min="{{$item->device->device_type->min_value}}"
                                   max="{{$item->device->device_type->max_value}}" name="{{$item->id_device}}"
                                   class="form-control control_device slider input_range"
                                   value="{{$item->device->devi_value}}" data-id="{{$item->id_devi}}">

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
            if ($(this).prop("checked") == true) {
                var id_device = $(this).data('id')
                // console.log($(this).data('id'));

                $.get('../control_checkbox_process/' + id_device + '/' + 1, function (data) {
                    console.log(data);
                })
            } else if ($(this).prop("checked") == false) {
                var id_device = $(this).data('id')
                console.log("không check");

                $.get('../control_checkbox_process/' + id_device + '/' + 0, function (data) {
                    console.log(data);
                })
            }

        })
        $('.input_range').change(function () {
            var value = $(this).val();
            var id_device=$(this).data('id');
            console.log(value + '_'+id_device);
            $.get('../control_range_process/' + id_device + '/' + value, function (data) {
                console.log(data);
            })
        })
    </script>
@endsection

