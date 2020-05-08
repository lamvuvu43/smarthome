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
                                <td style="display: none" id="{{$item->id_room}}">{{$item->id_room }}</td>
                                <td>{{$item->name_room}}</td>
                                <td>
                                    <a class="btn btn-outline-primary" href="{{route('show_room_edit',$item->id_room)}}"><i
                                            class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <a class="btn btn-danger btn_delete_room" ><i class="fa fa-eraser" aria-hidden="true"></i></a>
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
         $('.btn_delete_room').click(function () {
             var id_room = $(this).parent().parent().find('td').html();
             var token = $("meta[name='csrf-token']").attr("content");
             $.ajax({
                 url:"{{route('delete_room.process','')}}/" +id_room,
                 type:"delete",
                 data:{
                     'id':id_room,
                     '_token':token,
                 },
                 success:function () {
                     console.log("Delete success");
                     $('#'+id_room).parent().hide(400);
                 },
                 error:function () {
                     alert('Đã có lỗi xảy ra không thể xoá');
                 }
             })

         })
    </script>
@endsection()
