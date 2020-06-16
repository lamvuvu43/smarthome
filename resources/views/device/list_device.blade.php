@extends('welcome')
@section('list_device')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12 ">
        @if (session('add_success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session('add_success') }}
        </div>
        @endif
        <div class="list_device">
            <div class="text-center pb-4 pt-3 title_edit_device">
                <h4 class="modal-title">Danh sách thiết bị</h4>
            </div>
            <div class="table_device col-12 col-md-12 col-lg-12">
                <table class="table text-center table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th style="display: none">ID controller</th>
                            <th>ID Thiết bị</th>
                            <th scope="col">Name</th>
                            <th scope="col">Vị trí thiết bị</th>
                            <th scope="col">Tên người dùng</th>
                            <th>Quyền</th>
                            <th class="so_ng_chia_se">Số người chia sẻ</th>
                            <th>Chức năng</th>
                            <th class="share">Chia sẻ</th>
                            {{-- <th class="button-delete" style="display: none"> Thêm</th>--}}
                        </tr>
                    </thead>

                    @foreach($controller as $item)
                    <tr>
                        <td style="display: none">{{$item->id_con}}</td>

                        <td>{{$item->id_devi}}</td>
                        <td>{{$item->name_con}}</td>

                        @if($item->room != null)
                        <td class="text-left">Nhà:{{$item->room->floor->house->name_house}}
                            -Tầng: {{$item->room->floor->name_floor}}-Phòng: {{$item->room->name_room}}
                        </td>
                        @else
                        <td class="text-left">Không có thông tin</td>
                        @endif
                        <td>{{$item->user->full_name}} </td>
                        @if($item->id_per != 2)
                        <td>{{$item->permission->des_per}}</td>
                        @else
                        <td><a href="{{route('control_device_share',$item->id_con)}}">{{$item->permission->des_per}}</a></td>
                        @endif
                        @if(Auth::id()==$item->id_user && $item->id_per == 3 )
                        <td class="amount_share so_ng_chia_se">{{$item->id_devi}}</td>
                        @else
                       <td> Bạn không có quyền xem</td>
                        @endif
                        <td>
                            {{-- @if(Auth::id()==$item->id_user && $item->id_per == 3 ) --}}
                            <button class="btn btn-danger btn_remove_con" data-toggle="modal" data-target="#delete-controller" data><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <a href="{{route('edit_device.show',$item->id_con)}}"><i class="btn btn-primary fa fa-pencil-square" aria-hidden="true"></i></a>
                            {{-- @else
                                        Bạn không có quyền
                                    @endif --}}
                        </td>
                        @if($item->id_per === 3)
                        <td class="share">
                            <a class="btn btn-link" href="{{route('show_form_share',$item->id_con)}}"><i class="fa fa-share-alt" aria-hidden="true"></i>
                            </a>
                        </td>
                        @else
                        <td>Bạn không có quyền</td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="delete-controller" style="font: normal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Xoá thiết bị</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body delete-restaurant text-center">
                    <h2>Bạn có thực sử muốn xoá thiết bị <br> <span style="color: red;" id="name_device"> name device </span>
                    </h2>
                    <span id="address_devi" style="color: #1d68a7">Vị trí thiết bị</span> <br>
                    <span>khỏi hệ thống</span> <br>
                    <p style="display: none" id="id_con"></p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Huỷ</button>
                    <button type="button" class="btn btn-success btn-delete-controller" data-dismiss="modal">Đồng
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
    $(function() {
        $.get('../home/show_form_device/get_floor/' + $('#select_home').val(), function(data) {
            // thay thế html trên thành kết quả trả về
            // alert(data);
            $("#select_floor").html(data);
            setTimeout(function() {
                $("#select_floor").click();
            }, 500);

        });
    });
    $("#select_home").on("click", function() {
        $.get('../home/show_form_device/get_floor/' + $(this).val(), function(data) {
            // thay thế html trên thành kết quả trả về
            // alert(data);
            $("#select_floor").html(data);
        });
    });
    $("#select_floor").on("click", function() {
        $.get('../home/show_form_device/get_room/' + $(this).val(), function(data) {
            // thay thế html trên thành kết quả trả về
            // alert(data);
            $("#select_room").html(data);
        });
    })
    $('#mac').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    })
    // -------------------xoá controller------------------------
    $('.btn_remove_con').click(function() {
        var id_con = $(this).parent().parent().find('td').html();
        var name_device = $(this).parent().parent().find('td').next().next().html();
        var address_device = $(this).parent().parent().find('td').next().next().next().html();
        $('#name_device').html(name_device);
        $('#address_devi').html(address_device);
        $('#id_con').html(id_con);
        // console.log($address_device);
    });

    $('.btn-delete-controller').click(function() {
        var id_con = $('#id_con').html();
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "{{route('delete.process','')}}/" + id_con
            , type: 'DELETE'
            , data: {
                "id": id_con
                , "_token": token
            , }
            , success: function(data) {
                console.log(data);
                window.location.reload();
            },error:function(e){
                // alert('Có lỗi, không thể xoá');
                console.log(e.responseJSON.message)
            }
        , });
        // $("#" + id).parent().hide(400);
    })
    // ----------------------------------------------
    window.onload = function() {
        // var id_device = $('.amount_share').html();
        // setTimeout( function () {
        //     $('.amount_share').addClass(id_device);
        //     // $('.'+id_device+'').hide(500);
        //     $.get('../home/add_amount/'+ id_device,function (data) {
        //         $('.'+id_device+'').html(data)
        //         console.log(id_device);
        //     })
        // },200);
        amount_class = $('.amount_share').length;
        for (i = 0; i < amount_class; i++) {
            var id_device = $('.amount_share:eq(' + i + ')').html();

            $('.amount_share:eq(' + i + ')').addClass('a'+i);
            change_amount(id_device,i);
            // console.log('in i' + id_device);
        }

        function change_amount(id_device,i) {
           
            $('.' + id_device).show(300);
            $.get('../home/add_amount/' + id_device, function(data) {
               
                dataPlus = '<a class="btn btn-link" href="{{route('list.share.show','')}}/'+id_device+'" >' + data + '</a>';
             
                $('.a' + i).html(dataPlus);
            });
        }
    }

</script>
@endsection()
