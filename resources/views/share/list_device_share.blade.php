@extends('welcome')
@section('pageTitle','Danh sách thiết bị chia sẻ')
@section('list_device_share')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 ">
            @if (session('add_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session('add_success') }}
                </div>
            @endif
            <div class="list_device">
                <div class="text-center pb-4 pt-3 title_edit_device">
                    <h4 class="modal-title">Danh sách người dùng được chia sẻ</h4>
                </div>
                <div class="table_device col-12 col-md-12 col-lg-12">
                    <table class="table text-center table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th style="display: none">ID controller</th>
                            <th>ID Thiết bị</th>
                            <th scope="col">Tên thiết bị</th>
                            <th scope="col">Vị trí thiết bị</th>
                            <th scope="col">Tên người được chia sẽ</th>
                            <th>Quyền</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        {{--                        {{dd($list_share)}}--}}
                        @foreach($list_share as $item)
                            <tr>
                                <td style="display: none">{{$item->id_con}}</td>
                                <td class="id_device">{{$item->id_devi}}</td>
                                @if($item->name_con!= null)
                                    <td>{{$item->name_con}}</td>
                                @else
                                    <td>Chưa có thông tin</td>
                                @endif
                                @if($item->room != null)
                                    <td class="text-left">Nhà:{{$item->room->floor->house->name_house}}
                                        -Tầng: {{$item->room->floor->name_floor}}-Phòng: {{$item->room->name_room}}
                                    </td>
                                @else
                                    <td class="text-left">Không có thông tin</td>
                                @endif
                                @if($item->id_user!=null)
                                    <td class="user_share">{{$item->user->full_name}} <span class="id_user" style="display: none">{{$item->id_user}}</span></td>
                                    <td>{{$item->permission->des_per}}</td>
                                @else
                                    <td>Thiết bị chưa được chia sẻ</td>
                                    <td></td>
                                @endif


                                <td>
                                    {{--                                    {{dd($check_per)}}--}}
                                    @if($item->id_user == $check_per->id_user || $check_per->id_per==3)
                                        <button class="btn btn-danger btn_delete" data-toggle="modal"
                                                data-target="#delete-per"
                                                style="line-height: 0px"><i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                    @if($check_per->id_per != 3)
                                        Bạn không có quyền
                                    @else
                                        <a class="btn btn-block" href="{{route('form.edit.share.show',$item->id_con)}}">
                                            <i class="btn btn-primary fa fa-pencil-square" aria-hidden="true"></i></a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" id="delete-per" style="font: normal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Xoá chia sẻ</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body delete-restaurant text-center">
                        <h2>Bạn có thực sử muốn xoá sử dụng thiết bị  <span id="id_device" style="color: #1d68a7"></span>  của <br> <span style="color: red;" id="user_name"> name device </span>
                        </h2>
                        <br>
                        <span>khỏi hệ thống</span> <br>
                        <p style="display: none" id="id_con"></p>
                        <span id="id_user" style="display: none"></span>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Huỷ</button>
                        <button type="button" class="btn btn-success btn-delete-device" data-dismiss="modal">Đồng
                            ý
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);

        $('.btn_delete').click(function () {
            var id_device = $(this).parent().parent().find('.id_device').html();
            var user_name = $(this).parent().parent().find('.user_share').html();
            var id_user= $(this).parent().parent().find('.id_user').html();
            $('#user_name').html(user_name);
            $('#id_device').html(id_device);
            $('#id_user').html(id_user);
            console.log(id_user);
        });
        $(document).on('click','.btn-delete-device',function () {
            var arry= new Array();
            var id_devi=$('#id_device').html();
            var id_user=$('#id_user').html();
            // console.log(id_user)
            // var plus =id_devi + '_' + id_user;
            arry.push(id_devi)
            arry.push(id_user)
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "../delete_share_device/" + id_devi + '/'+ id_user,
                type: 'DELETE',
                data: {
                    "id": {id_devi:id_user},
                    "_token": token,
                },
                success: function (data) {
                    console.log(data);
                    window.location.reload();
                },
            });
        });
    </script>
@endsection()
