@extends('welcome')
@section('pageTitle','Danh sách nhà')
@section('list_house')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 ">
            @if (session('update_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session('update_success') }}
                </div>
            @endif
            <div class="list_device">
                <div class="text-center pb-4 pt-3 title_edit_device">
                    <h4 class="modal-title">Danh sách ngôi nhà</h4>
                </div>
                <div class="table_device col-12 col-md-12 col-lg-12">
                    <table class="table text-center table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th style="display: none">ID ngôi nhà</th>
                            <th>Tên ngôi nhà</th>
                            <th scope="col">Số tầng</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>

                        @foreach($get_house as $item)
                            <tr>
                                <td style="display: none" id="{{$item->id_house}}">{{$item->id_house}}</td>
                                <td>{{$item->name_house}}</td>
                                <td>
                                    <a href="{{route('list_floor_edit',$item->id_house)}}"
                                       class="amount_floor ">{{count($item->floor)}}

                                    </a>
                                    <br>
                                    <span class="title_detail" style="display: none"> Click để xem chi tiết</span>
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary"
                                       href="{{route('show_edit_house.show',$item->id_house)}}"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <button class="btn btn-danger btn_delete_house"  data-toggle="modal"
                                            data-target="#delete-house"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" id="delete-house" style="font: Time_New_Romam">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 class="modal-title">Xoá ngôi nhà</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body delete-restaurant text-center" style="font-size: 24px">
                        <h2>Bạn có thực sử muốn xoá ngôi nhà <br> <span style="color: red;"
                                                                        id="name_house"> name house </span>
                            khỏi hệ thống
                        </h2>
                        <br>
                        <span id="caution"
                              style="color: #1d68a7">Việc này sẽ xoá luôn tầng và phòng thuộc ngôi nhà này</span> <br>

                        <p style="display: none" id="id_house"></p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Huỷ</button>
                        <button type="button" class="btn btn-success btn-delete-house" data-dismiss="modal">Đồng
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
        $('.amount_floor').mouseover(function () {
            $(this).parent().find('.title_detail').show(500);
        });
        $('.btn_delete_house').click(function () {
            var id_house = $(this).parent().parent().find('td').html();
            var name_house = $(this).parent().parent().find('td').next().html();
            $('#name_house').html(name_house);
            $('#id_house').html(id_house);
        })
        $('.btn-delete-house').click(function () {
            var id_house = $('#id_house').html();
            var token = $("meta[name='csrf-token']").attr('content');
            $.ajax({
                url: '../admin/home/delete/'+id_house,
                type: 'DELETE',
                data: {
                    "id": id_house,
                    "_token":
                    token,
                },
                success: function (data) {
                    console.log(data);
                    // window.location.reload();
                    $('#'+id_house).parent().hide(700);
                },
                error:function () {
                    alert('Không thể xoá!!!. Do có thiết bị gắn với phòng của ngôi nhà này');
                }
            });
        })
    </script>
@endsection()
