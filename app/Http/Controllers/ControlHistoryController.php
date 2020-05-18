<?php

namespace App\Http\Controllers;

use App\Models\ControlHistory;
use App\Models\ModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlHistoryController extends Controller
{
    public function select_con()
    {
        $get_con = ModelController::where('id_user', Auth::id())->get();
        return view('controlhistory.list_con_his', compact('get_con'));
    }

    public function list_con_his($id_devi)
    {
        $get_con_his = ModelController::where('id_devi', $id_devi)->get();
        $j=0;
        foreach ($get_con_his as $item) {

            foreach ($item->controlhistory as $item_his) {
                $j++;
                echo "<tr>";
                echo "<td>" . $j . "</td>";
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
//            $i = $j;
        }
    }

    public function lis_his_devi($id_devi)
    {
        $get_con_his = ModelController::where('id_devi', $id_devi)->get();
        return view('controlhistory.list_his_devi', compact('get_con_his'));
    }
}
