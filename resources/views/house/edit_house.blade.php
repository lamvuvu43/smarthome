@extends('welcome')
@section('pageTitle','Chỉnh sửa nhà')
@section('edit_house')
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
                    <h4 class="modal-title">Chỉnh sửa ngôi nhà</h4>
                </div>
                <div class="form_edit_device col-12 col-md-12 col-lg-12">
                    {{--                {{dd($get_house)}}--}}
                    <form class="form-group" action="{{route('edit_house.process',$get_house->id_house)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="pb-2" for="name_house">Tên ngôi nhà</label>
                            <input class="form-control"  value="{{$get_house->name_house}}" name="name_house"
                                   id="name_house">
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
