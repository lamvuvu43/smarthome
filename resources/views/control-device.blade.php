@extends('welcome')
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
        <div class="col-sm-12 col-md-6 col-lg-6">

            @foreach($get_controller as $item)
                <div class="row mt-3 mr-2 content-device">
                    <label class="for">Tên thiết bị</label>
                    <input type="range" min="{{$item->device->device_type->min_value}}"
                           max="{{$item->device->device_type->max_value}}" name="{{$item->id_device}}"
                           class="form-control control_device">
                    <p></p>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $('#goback').show(200);
        $('.control_device').change(function () {
            console.log($(this).val());
            $(this).parent().find("p").html($(this).val())
        })
        // $('.title_status').show();
    </script>
@endsection

