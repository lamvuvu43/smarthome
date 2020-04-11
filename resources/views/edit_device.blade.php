@extends('welcome')
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
                    <h4 class="modal-title">Chỉnh sửa thiết bị</h4>
                </div>
                <div class="table_device">
                    <table class="table text-center table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tên controller</th>
                            <th>Tên Module</th>
                            <th scope="col">Thiết bị</th>
                            <th scope="col">Vị trí thiết bị</th>
                            <th scope="col">Người sở hữu</th>

                            <th>Thao tác</th>
                        </tr>
                        </thead>

                        @foreach($controller as $item)
                            <tr>
                                @if($item->name_controller != null)
                                    <td>{{$item->name_controller}}</td>
                                @else
                                    <td>Không có thông tin</td>
                                @endif
                                @if($item->module != null)
                                    <td>{{$item->module->name_mod}}</td>
                                    <td>{{$item->module->mac}}</td>
                                @else
                                    <td>Không có thông tin</td>
                                    <td>Không có thông tin</td>
                                @endif
                                @if($item->room!= null)
                                    <td class="text-left">{{$item->room->name_room}}
                                        - {{$item->room->floor->name_floor}}
                                        - {{$item->room->floor->house->name_house}}</td>
                                @else
                                    <td class="text-left">Không có thông tin</td>
                                @endif
                                <td>{{$item->user->last_name}} {{$item->user->first_name}}</td>

                                <td>
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
        $(function () {
            $.get('../home/show_form_device/get_floor/' + $('#select_home').val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_floor").html(data);
                setTimeout(function () {
                    $("#select_floor").click();
                }, 500);

            });
        });
        $("#select_home").on("click", function () {
            $.get('../home/show_form_device/get_floor/' + $(this).val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_floor").html(data);
            });
        });
        $("#select_floor").on("click", function () {
            $.get('../home/show_form_device/get_room/' + $(this).val(), function (data) {
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
