@extends('welcome')
@section('list_home')
    @if(Auth::check()==true)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 title_status">
                <h1 style="color: #a71d2a;text-align: center;font-size: 25px">Hiện tại bạn đang có {{count($house)}}
                    ngôi nhà</h1>
            </div>
        </div>
        <div class="row">
            @foreach($house as $i => $item)
                <div class="col-sm-12 col-md-6 col-lg-3 location loc-1 ">
                    <div class="get_link" style="display: none">{{route('list_floor',$item->id_house)}}</div>
                    <div class="location-content pb-3 ">{{$item->name_house}}</div>
                    <div class="list_floor">Nhà có {{count($item->floor)  }} tầng</div>
                </div>

            @endforeach
            <div class="col-sm-12 col-md-6 col-lg-3 location loc-1 ">
                <div class="add_function">
                    <a href="{{route('add_home')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                <div style="display: none" class="note_btn">
                    Click để thêm nhà
                </div>
            </div>
        </div>
    @endif()
    <script>
        $('.location').click(function () {
            window.location.href = $(this).find('.get_link').html();
        })
    </script>
@endsection()
