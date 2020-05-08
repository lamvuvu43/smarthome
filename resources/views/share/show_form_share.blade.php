@extends('welcome')
@section('pageTitle','Chia sẻ thiết bị')
@section('show_form_share')
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
                    <h4 class="modal-title">Chia sẻ thiết bị</h4>
                </div>
                <div class="form_edit_device col-12 col-md-12 col-lg-12">
                    <form class="form-group"
                          action="{{route('show_form_share.process',$get_controller->id_con)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="pb-2">ID thiết bị</label>
                            <input class="form-control" readonly value="{{$get_controller->id_devi}}" name="id_devi">
                        </div>
                        <div class="form-group">
                            <label for="name_devi" class="pb-2"> Tên thiết bị</label>
                            <input class="form-control" readonly value="{{$get_controller->name_con}}" name="name_devi"
                                   id="name_devi">
                        </div>
                        <div class="form-group" style="background-color: lightblue">
                            <div class="title_address_devi pt-2 pb-2 text-center">Vị trí thiết bị</div>
                            <div class="select-house">
                                <label for="select_home" class="pb-2 pt-2">Thiết bị đang ở</label>
                                @if($get_controller->room!=null)
                                    <textarea class="form-control"
                                              readonly>Nhà:<?php echo str_replace('', '', $get_controller->room->floor->house->name_house)?>-Tầng: <?php echo str_replace('', '', $get_controller->room->floor->name_floor) ?>-Phòng: <?php echo str_replace('', '', $get_controller->room->name_room)?>
                                              </textarea>
                                @else
                                    <textarea class="form-control"
                                              readonly> Chưa có thông tin</textarea>
                                @endif
                            </div>
                            <div class="select-user">
                                <label for="id_user" class="pt-2 pb-2">Chọn tài khoản chia sẻ</label>
{{--                                <select name="id_user" id="id_user" class="form-control">--}}
{{--                                    @foreach($user as $item)--}}
{{--                                        <option value="{{$item->id}}">{{$item->full_name}} - {{$item->email}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            <!-- For defining autocomplete -->
                                <input type="text" id='user_search' class="form-control">

                                <!-- For displaying selected option value from autocomplete suggestion -->
                                <input type="text" id='user_id' readonly name="id_user" style="display: none">
                            </div>
                            <div class="select-per">
                                <label for="id_per" class="pt-2 pb-2">Quyền điều khiển</label>
                                <select name="id_per" id="id_per" class="form-control">
                                    @foreach($get_per as $item)
                                        <option
                                            value="{{$item->id_per}}">{{$item->des_per}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="btn_submit text-center mt-2 ">
                                <button type="submit" class="btn btn-primary mb-2">Chia sẽ</button>
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

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            $( "#user_search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('autocomplete.user')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#user_search').val(ui.item.label); // display the selected text
                    $('#user_id').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        });
    </script>
@endsection
