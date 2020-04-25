@extends('welcome')
@section('pageTitle','Danh sách phòng')
@section('list_room_edit')
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
                    <h4 class="modal-title">Danh sách phòng của tầng <span
                            style="color: red">{{$get_floor->name_floor}}</span> thuộc ngôi nhà
                        <span
                            style="color: red">{{$get_floor->house->name_house}}</span></h4>
                </div>
                <div class="table_device col-12 col-md-12 col-lg-12">
                    <table class="table text-center table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th style="display: none">ID phòng</th>
                            <th>Tên phòng</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                        {{--                                                {{dd($get_floor)}}--}}
                        @foreach($get_room as $item)
                            <tr>
                                <td style="display: none">{{$item->id_room }}</td>
                                <td>{{$item->name_room}}</td>
                                <td>
                                    <a class="btn btn-link" href="{{route('show_room_edit',$item->id_room)}}"><i
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
