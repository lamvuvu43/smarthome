@extends('welcome')
@section('edit_device')
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
                    <h4 class="modal-title">Chỉnh sửa thiết bị</h4>
                </div>
                <div class="form_edit_device">
                    <
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
        $(function () {
            $.get('../home/show_form_device/get_floor/' + $('#select_home').val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_floor").html(data);
                setTimeout(function () {
                    $("#select_floor").click();
                }, 500);

            });
        });
        $("#select_home").on("click", function () {
            $.get('../home/show_form_device/get_floor/' + $(this).val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_floor").html(data);
            });
        });
        $("#select_floor").on("click", function () {
            $.get('../home/show_form_device/get_room/' + $(this).val(), function (data) {
                // thay thế html trên thành kết quả trả về
                // alert(data);
                $("#select_room").html(data);
            });
        })
        $('#mac').keyup(function () {
            $(this).val($(this).val().toUpperCase());
        })
    </script>
@endsection()
