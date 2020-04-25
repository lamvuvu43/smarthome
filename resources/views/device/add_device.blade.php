@extends('welcome')
@section('pageTitle','Thêm thiết bị')
@section('add_device')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if (session('add_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session('add_success') }}
                </div>
            @endif
                @if (session('error_mac'))
                    <div class="alert alert-danger ">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ session('error_mac') }}
                    </div>
                @endif
            <div class="add_device">
                <div class="text-center pb-4 pt-3 title_edit_device">
                    <h4 class="modal-title">Thêm thiết bị</h4>
                </div>
                <form action="{{route('add_device.process')}}" method="post">
                    @csrf
                    <div class="sup_add_device">
                        <label> Nhập MAC thiết bị <span
                                style="float: right;padding-right: 10px;color: red">*</span></label>
                        <input type="text" name="mac" id="mac" required
                               oninvalid="this.setCustomValidity('MAC thiết bị không được trống')"
                               oninput="setCustomValidity('')" maxlength="20">
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success ">Thêm thiết bị</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.header').hide(200);
        $('#mac').keyup(function () {
            $string = $(this).val();
            $(this).val($string.toUpperCase());
        });
        $('#goback').show();

    </script>
@endsection()
