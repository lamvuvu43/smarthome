@extends('welcome')
@section('list_device')
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
                    <h4 class="modal-title">Danh sách thiết bị</h4>
                </div>
                <div class="table_device">
                    <table class="table text-center table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID controller</th>
                            <th>ID Thiết bị</th>
                            <th scope="col">Name</th>
                            <th scope="col">Vị trí thiết bị</th>
                            <th scope="col">Người đ</th>
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>

                        @foreach($controller as $item)
                            <tr>
                                @if($item->id_con != null)
                                    <td>{{$item->id_con}}</td>
                                @else
                                    <td>Không có thông tin</td>
                                @endif

                                <td>{{$item->id_devi}}</td>
                                <td>{{$item->name_con}}</td>

                                @if($item->room != null)
                                    <td class="text-left">{{$item->room->name_room}}
                                        - {{$item->room->floor->name_floor}}
                                        - {{$item->room->floor->house->name_house}}</td>
                                @else
                                    <td class="text-left">Không có thông tin</td>
                                @endif
                                <td>{{$item->user->full_name}} </td>
                                <td>{{$item->permission->des_per}}</td>
                                <td>
                                    <button><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <a href="{{route('edit_device.show',$item->id_con)}}"><i
                                            class="btn btn-primary fa fa-pencil-square" aria-hidden="true"></i></a>
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
