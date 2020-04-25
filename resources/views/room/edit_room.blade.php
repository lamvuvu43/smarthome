@extends('welcome')
@section('pageTitle','Chỉnh sửa phòng')
@section('edit_room')
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
                    <h4 class="modal-title">Chỉnh sửa phòng của
                        <span
                            style="color: red">{{$get_room->floor->name_floor}}</span> thuộc ngôi nhà
                        <span
                            style="color: red">{{$get_room->floor->house->name_house}}</span>
                    </h4>
                </div>
                <div class="form_edit_device col-12 col-md-12 col-lg-12">
                    <form class="form-group" action="{{route('show_room_edit_process',$get_room->id_room)}}"
                          method="post">
                        @csrf
                        <input style="display: none" name="id_floor" value="{{$get_room->floor->id_floor}}">
                        <div class="form-group">
                            <label class="pb-2" for="name_floor">Tên tầng</label>
                            <input class="form-control" readonly value="{{$get_room->floor->name_floor}}"
                                   name="name_floor"
                                   id="name_floor">
                        </div>
                        <div class="form-group">
                            <label class="pb-2" for="name_room">Tên phòng</label>
                            <input class="form-control" value="{{$get_room->name_room}}" name="name_room"
                                   id="name_room">
                        </div>
                        <div class="btn_submit text-center mt-2 ">
                            <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
    </script>
@endsection()
