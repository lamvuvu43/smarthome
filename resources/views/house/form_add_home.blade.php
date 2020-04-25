@extends('welcome')
@section('pageTitle','Thêm nhà')
@section('form_add_home')
    <script>
        $(function () {
            $('.header').hide(500);
        })
    </script>
    <div class="row">
        <div class="form_add_home mt-3">
            <form action="{{route('add_home_processing')}}" method="POST">
                @csrf
                <div class="title_form_add_home  mb-3 text-center"><h2>Thêm thông tin nhà</h2></div>
                <div class="form-group name_house pr-2 pl-2">
                    <label for="house">Tên nhà</label>
                    <input type="text" class="form-control" placeholder="Nguyên Văn Linh" name="house" id="house"  required oninvalid="this.setCustomValidity('Tên nhà của bạn không được rỗng')" oninput="this.setCustomValidity('')">
                </div>
                <div id="floor_room">
                    <div class="sup_floor_room">
                        <div class="form-group name_floor pr-2 pl-2" >
                            <label for="floor">Tên tầng</label>
                            <input type="text" min="1" max="2" value="" class="form-control " placeholder="Tầng thứ mấy"
                                   id="floor"  name="floor[]">
                        </div>
{{--                        <div class="form-group name_room pr-2 pl-2">--}}
{{--                            <label for="room">Tên số phòng mỗi tầng</label>--}}
{{--                            <input type="number" min="1" max="2" value="1" class="form-control" placeholder="1"--}}
{{--                                   name="room" id="room">--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="form-group name_button text-right pr-1 pt-1">
                    <button type="button" class="btn btn-primary" id="add_floor">Thêm tầng</button>
                </div>
                <div class="form-group name_button text-center">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>

        </div>
    </div>
    <script>
        $('#add_floor').click(function () {

            var $floor = $('.sup_floor_room').find('.name_floor').html();
            var $floorplus = '<div class="form-group name_floor pr-2 pl-2" >  <a style="float: right;color: white" class=" btn btn-danger btn_remove">Xoá</a>'+ $floor + "</div>";
            // console.log($floorplus);
            $('.sup_floor_room').append($floorplus);
        })
        $(document).on('click','.btn_remove',function () { // cứ pháp này được sử dụng khi class được thêm sao khi load page
            // console.log('clicking');
            $(this).parent().remove();
        });
        $('#goback').show();
    </script>
@endsection()
