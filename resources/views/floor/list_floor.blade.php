@extends('welcome')
@section('pageTitle','Danh sách tầng')
@section('list_floor_edit')
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
                    <h4 class="modal-title">Danh sách tầng của nhà <span
                            style="color: red">{{$get_house->name_house}}</span></h4>
                </div>
                <div class="table_device col-12 col-md-12 col-lg-12">
                    <table class="table text-center table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th style="display: none">ID tầng</th>
                            <th>Tên tầng</th>
                            <th scope="col">Số phòng</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        {{--                                                {{dd($get_floor)}}--}}
                        @foreach($get_floor as $item)
                            <tr>
                                <td style="display: none" id="{{$item->id_floor}}">{{$item->id_floor}}</td>
                                <td>{{$item->name_floor}}</td>
                                <td>
                                    <a href="{{route('list_room_edit',$item->id_floor)}}"
                                       class="amount_floor">{{count($item->room)}}</a>
                                    <br>
                                    <span class="title_detail" style="display: none"> Click để xem chi tiết</span>
                                </td>
                                <td>
                                    <a class="btn btn-outline-primary"
                                       href="{{route('show_floor_edit',$item->id_floor)}}"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <a class="btn btn-danger btn_delete_floor"><i class="fa fa-eraser"
                                                                                       aria-hidden="true"></i></a>
                                </td>
                        @endforeach
                    </table>
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
        $(".btn_delete_floor").click(function () {
            var id_floor = $(this).parent().parent().find('td').html();
            console.log(id_floor);
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "{{route('delete_floor.process','')}}/" + id_floor
                , type: 'DELETE'
                , data: {
                    "id": id_floor
                    , "_token": token

                }
                , success: function () {
                    console.log("Delete successful");
                    $("#"+id_floor).parent().hide(500);
                },
                error: function () {
                    alert('Đã có sự cố không thể xoá tầng');
                }
                ,
            });
        })
    </script>
@endsection()
