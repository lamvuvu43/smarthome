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
                <div class="table_device col-12 col-md-12 col-lg-12" style="height: 450px;overflow: auto">
                    <table class="table text-center table-striped ">
                        <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Người điều khiển</th>
                            <th>ID Thiết bị | Tên thiết bị</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Giá trị</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($get_con_his as $i => $item) {
                            $i++;
                            foreach ($item->controlhistory as $item_his) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $item_his->controller->user->full_name . "</td>";
                                if ($item_his->controller->name_con == null) {
                                    echo "<td>" . $item_his->controller->id_devi . "</td>";
                                } else {
                                    echo "<td>" . $item_his->controller->name_con . "</td>";
                                }
                                echo "<td>" . $item_his->con_time . "</td>";
                                echo "<td>" . $item_his->value_input . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#goback').show();
        $('.header').hide(200);
    </script>
@endsection()
