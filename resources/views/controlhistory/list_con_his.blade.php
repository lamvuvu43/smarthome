@extends('welcome')
@section('pageTitle', 'Lịch sủ điều khiển')
@section('list_con_his')
    <div class="row" xmlns="http://www.w3.org/1999/html">

        <div class="col-12 col-md-12 col-lg-12 ">
            @if (session('add_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session('add_success') }}
                </div>
            @endif
            <div class="list_device">
                <div class="text-center pb-4 pt-3 title_edit_device">
                   <div class="text-left  pr-3 pl-3">
                       <label class="mb-3">Lựa chọn thiết bị để xem lịch sửa</label>
                       <select id="select_con" class="form-control">
                           @foreach($get_con as $item)
                               <option value="{{$item->id_con}}">@if($item->name_con == null) {{$item->id_devi}}@else {{$item->name_con}} @endif</option>
                           @endforeach
                       </select>
                   </div>
                </div>
                <div class="table_device col-12 col-md-12 col-lg-12"  style="height: 450px;overflow: auto">
                    <table class="table text-center table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
{{--                            <th>Người điều khiển</th>--}}
                            <th>ID Thiết bị | Tên thiết bị</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Giá trị</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
        window.onload=function () {
            var id_con=$('#select_con').val();
            $.get('../home/list_con_his/jquery/'+id_con,function (data) {
                $('tbody').html(data);
            })
        }
        $('#select_con').click(function () {
            var id_con=$(this).val();
            $.get('../home/list_con_his/jquery/'+id_con,function (data) {
                $('tbody').html(data);
            })
        })
    </script>
@endsection()
