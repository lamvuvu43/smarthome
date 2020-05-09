@extends('welcome')
@section('pageTitle','Chỉnh sửa thiết bị')
@section('edit_device')
    <div class="row">
        @if (session('add_success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session('add_success') }}
            </div>
        @endif
        <div class="col-12 col-md-12 col-lg-12 ">
            <div class="edit_device">
                <div class="text-center pb-4 pt-3 title_edit_device">
                    <h4 class="modal-title">Cập nhật vị trí thiết bị</h4>
                </div>
                <div class="form_edit_device col-12 col-md-12 col-lg-12">
                    {{--                {{dd($get_controller)}}--}}
                    <form class="form-group" action="{{route('update.process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="pb-2">ID thiết bị</label>
                            <input class="form-control" readonly value="{{$get_controller->id_devi}}" name="id_devi">
                        </div>
                        <div class="form-group">
                            <label for="name_devi" class="pb-2"> Tên thiết bị</label>
                            <input class="form-control" value="{{$get_controller->name_con}}" name="name_devi"
                                   id="name_devi">
                        </div>
                        <div class="form-group" style="background-color: lightblue">
                            <div class="title_address_devi pt-2 pb-2 text-center">Vị trí thiết bị</div>
                            <div class="select-house">
                                <label for="select_home" class="pb-2 pt-2">Chọn ngôi nhà</label>
                                <select name="select_house" id="select_home" class="form-control pb-2 pt-2">
                                    @if($get_controller->id_floor != null)
                                        @foreach($get_house as $item)
                                            <option
                                                value="{{$item->id_house}}"<?php echo ($item->id_house == $get_controller->room->floor->house->id_house) ? "selected" : '' ?>>{{$item->name_house}}</option>
                                        @endforeach
                                    @else
                                        @foreach($get_house as $item)
                                            <option
                                                value="{{$item->id_house}}">{{$item->name_house}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="select-floor">
                                <label for="select_floor" class="pb-2 pt-2">Chọn tầng của ngôi nhà</label>
                                <select name="select_floor" id="select_floor" class="form-control pb-2 pt-2">

                                </select>
                            </div>
                            <div class="select-room">
                                <label for="select_room" class="pt-2 pb-2">Chọn phòng</label>
                                <select name="select_room" id="select_room" class="form-control">

                                </select>
                            </div>
                            <div class="btn_submit text-center mt-2 ">
                                <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
        $(function () {
            $.get('../show_form_device/get_floor/' + $('#select_home').val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_floor").html(data);
                setTimeout(function () {
                    $("#select_floor").click();
                }, 500);

            });
        });

        $("#select_home").on("click", function () {
            $.get('../show_form_device/get_floor/' + $(this).val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_floor").html(data);
            });
        });
        $("#select_floor").on("click", function () {
            $.get('../show_form_device/get_room/' + $(this).val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_room").html(data);
            });
        })
        $('#mac').keyup(function () {
            $(this).val($(this).val().toUpperCase());
        })
    </script>
@endsection()
