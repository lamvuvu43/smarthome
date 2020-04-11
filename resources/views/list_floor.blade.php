@extends('welcome')
@section('list_floor')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 title_status">
            <h1 style="color: #a71d2a;text-align: center;font-size: 25px">Danh sách tầng nhà</h1>
        </div>
    </div>
    <div class="row">
        @foreach($floor as $item)
            <div class="col-sm-12 col-md-6 col-lg-3 location loc-1 ">
                <div class="get_link" style="display: none">{{route('list_room',$item->id)}}</div>
                <div class="location-content pb-3 ">{{$item->name_floor}}</div>
                <ul class="list_floor">
                        <li class="pt-2 pb-1">
                          Có {{count($item->room)}} phòng
                        </li>
                </ul>
            </div>
        @endforeach
    </div>
    <div class="row" id="list_room">

    </div>
    <script>
        $('#goback').show(200);
       $('.location').click(function () {
           var $link = $(this).find('.get_link').html();
           // alert($link);
           $.get($link, function (data) {
               // thay thế html trên thành kết quả trả về
               // alert(data);
               $("#list_room").html(data);
           });
       })
    </script>
@endsection()
