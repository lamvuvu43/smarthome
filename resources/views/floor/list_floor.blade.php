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
                    <h4 class="modal-title">Danh sách tầng của nhà <span style="color: red">{{$get_house->name_house}}</span></h4>
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
                                <td style="display: none">{{$item->id_floor}}</td>
                                <td>{{$item->name_floor}}</td>
                                <td>
                                    <a href="{{route('list_room_edit',$item->id_floor)}}"
                                       class="amount_floor">{{count($item->room)}}</a>
                                    <br>
                                    <span class="title_detail" style="display: none"> Click để xem chi tiết</span>
                                </td>
                                <td>
                                    <a class="btn btn-link" href="{{route('show_floor_edit',$item->id_floor)}}"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                </td>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{--        <div class="modal" id="delete-controller" style="font: normal">--}}
        {{--            <div class="modal-dialog">--}}
        {{--                <div class="modal-content">--}}

        {{--                    <!-- Modal Header -->--}}
        {{--                    <div class="modal-header">--}}
        {{--                        <h4 class="modal-title">Xoá thiết bị</h4>--}}
        {{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
        {{--                    </div>--}}

        {{--                    <!-- Modal body -->--}}
        {{--                    <div class="modal-body delete-restaurant text-center">--}}
        {{--                        <h2>Bạn có thực sử muốn xoá thiết bị <br> <span style="color: red;" id="name_device"> name device </span>--}}
        {{--                        </h2>--}}
        {{--                        <span id="address_devi" style="color: #1d68a7">Vị trí thiết bị</span> <br>--}}
        {{--                        <span>khỏi hệ thống</span> <br>--}}
        {{--                        <p style="display: none" id="id_con"></p>--}}
        {{--                    </div>--}}

        {{--                    <!-- Modal footer -->--}}
        {{--                    <div class="modal-footer text-right">--}}
        {{--                        <button type="button" class="btn btn-primary" data-dismiss="modal">Huỷ</button>--}}
        {{--                        <button type="button" class="btn btn-success btn-delete-controller" data-dismiss="modal">Đồng--}}
        {{--                            ý--}}
        {{--                        </button>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>

    <script>
        $('#goback').show();
        $('.header').hide(200);
        $('.amount_floor').mouseover(function () {
            $(this).parent().find('.title_detail').show(500);
        });

    </script>
@endsection()
