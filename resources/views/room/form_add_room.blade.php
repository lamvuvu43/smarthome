@extends('welcome')
@section('pageTitle','Thêm phòng')
@section('form_add_room')

    <script>
        $(function () {
            $('.header').hide(500);
        })
    </script>
    {{--    {{dd($get_house)}}--}}
    <div class="row">

        <div class="form_add_room mt-3">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{route('add_room_processing')}}" method="POST">
                @csrf
                <div class="title_form_add_home  mb-3 text-center"><h2>Thêm phòng</h2></div>
                <div class="form-group name_house pr-2 pl-2">
                    <label for="id_house">Tên nhà</label>
                    <select name="id_house" class="form-control select_house" id="id_house">
                        @foreach($get_house as $item)
                            <option value="{{$item->id_house}}">{{$item->name_house}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sup_floor_room">
                    <div class="form-group name_floor pr-2 pl-2">
                        <label for="floor">Tên tầng</label>
                        <select name="id_floor" class="form-control" id="id_floor">
                            @foreach($get_house as $item)
                                @foreach($item->floor as $item_floor)
                                    <option value="{{$item_floor->id_floor}}">{{$item_floor->name_floor}}</option>
                                @endforeach
                                @break
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="add_room">
                    <div class="form-group name_room pr-2 pl-2">
                        <label for="name_room">Tên Phòng</label>
                        <input class="form-control" name="name_room[]" id="name_room" placeholder="Phòng khách"
                               oninvalid="this.setCustomValidity('Vui lòng nhập tên phòng')"
                               oninput="this.setCustomValidity('')" required>
                    </div>
                </div>
                <div class="form-group name_button text-right pr-1 pt-1">
                    <button type="button" class="btn btn-primary" id="add_room">Thêm phòng</button>
                </div>
                <div class="form-group name_button text-center">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <table id="table_room">

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#add_room').click(function () {

            var $room = $('.add_room').find('.name_room').html();
            var $roomplus = '<div class="form-group name_room pr-2 pl-2" >  <a style="float: right;color: white" class=" btn btn-danger btn_remove">Xoá</a>'+ $room + "</div>";
            console.log($roomplus);
            $('.add_floor').append($roomplus);
        })
        $(document).on('click','.btn_remove',function () { // cứ pháp này được sử dụng khi class được thêm sao khi load page
            // console.log('clicking');
            $(this).parent().remove();
        });
        $('#id_house').click(function () {
            var $id_house=$(this).val();
            // console.log($id_house);
            $.get('../admin/add_room/jquery_get_floor/'+ $id_house ,function (data) {
                $("#id_floor").html(data)
            })
        })
        $(document).on('click','#id_floor',function () {
            var $id_floor=$(this).val();
            // console.log($id_floor);
            $("#table_room").show(200);
            $.get('../admin/add_room/jquery_get_room/'+ $id_floor ,function (data) {
                console.log(data);
                $("table").html(data)
            })
        })
        $('#goback').show();
    </script>
@endsection()
