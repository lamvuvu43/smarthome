@extends('welcome')
@section('pageTitle','Thêm tầng')
@section('create_floor')
<div class="row">
    @if (session('add_success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session('add_success') }}
    </div>
    @endif
    <div class="col-12 col-md-12 col-lg-12">
        <div class="form_add_home mt-3">
            <form action="{{ route('create_floor.store') }}" method="POST">
                @csrf
                <div class="title_form_add_home  mb-3 text-center">
                    <h2>Thêm tầng</h2>
                </div>
                <div class="form-group name_house pr-2 pl-2">
                    <label for="id_house">Chọn ngồi nhà</label>
                    <select name="id_house" id="id_house" class="form-control">
                        @if(count($get_house)>0)
                        @foreach($get_house as $item)
                        <option value="{{ $item->id_house }}">{{ $item->name_house }}</option>
                        @endforeach
                        @else
                        <option value="">Bạn chưa có nhà vui lòng thêm nhà</option>
                        @endif
                    </select>
                </div>
                <div id="floor_room">
                    <div class="sup_floor_room">
                        <div class="form-group name_floor pr-2 pl-2">
                            <label for="floor">Tên tầng</label>
                            <input type="text" min="1" max="2" value="" class="form-control " placeholder="Tầng thứ mấy" id="floor" name="floor[]">
                        </div>

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
</div>
<script>
    $('#goback').show();
    $('.header').hide(200);

</script>
<script>
    $('#add_floor').click(function() {

        var $floor = $('.sup_floor_room').find('.name_floor').html();
        var $floorplus = '<div class="form-group name_floor pr-2 pl-2" >  <a style="float: right;color: white" class=" btn btn-danger btn_remove">Xoá</a>' + $floor + "</div>";
        // console.log($floorplus);
        $('.sup_floor_room').append($floorplus);
    })
    $(document).on('click', '.btn_remove', function() { // cứ pháp này được sử dụng khi class được thêm sao khi load page
        // console.log('clicking');
        $(this).parent().remove();
    });
    $('#goback').show();

</script>
@endsection()
