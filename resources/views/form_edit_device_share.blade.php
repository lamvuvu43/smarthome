@extends('welcome')
@section('form_device_share')
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
                    <h4 class="modal-title">Chỉnh sửa thông tin chia sẻ</h4>
                </div>
                <div class="form_edit_device col-12 col-md-12 col-lg-12">
                    <form class="form-group" action="{{route('update_share_device.process',$get_controller->id_con)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="pb-2">ID thiết bị</label>
                            <input class="form-control" readonly value="{{$get_controller->id_devi}}" name="id_devi">
                        </div>
                        <div class="form-group">
                            <label for="name_devi" class="pb-2"> Tên thiết bị</label>
                            <input class="form-control"  readonly value="{{$get_controller->name_con}}" name="name_devi"
                                   id="name_devi">
                        </div>
                        <div class="form-group" style="background-color: lightblue">
                            <div class="title_address_devi pt-2 pb-2 text-center">Vị trí thiết bị</div>
                            <div class="select-house">
                                <label for="select_home" class="pb-2 pt-2">Chọn ngôi nhà</label>
                                <textarea class="form-control"
                                          readonly>Nhà:<?php echo str_replace('', '', $get_controller->room->floor->house->name_house)?>-Tầng: <?php echo str_replace('', '', $get_controller->room->floor->name_floor) ?>-Phòng: <?php echo str_replace('', '', $get_controller->room->name_room)?>
                                              </textarea>
                            </div>
                            <div class="address">
                                <label for="address" class="pb-2 pt-2">Tên người được chia sẽ</label>
                                <input class="form-control" value="{{$get_controller->user->full_name}}" readonly>
                            </div>
                            <div class="select-per">
                                <label for="id_per" class="pt-2 pb-2">Quyền điều khiển</label>
                                <select name="id_per" id="id_per" class="form-control">
                                    @foreach($get_per as $item)
                                        <option
                                            value="{{$item->id_per}}" <?php echo ($item->id_per == $get_controller->id_per) ? 'selected' : '' ?> >{{$item->des_per}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="btn_submit text-center mt-2 ">
                                <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                            </div>
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
@endsection
