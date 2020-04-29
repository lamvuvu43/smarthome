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

    public function list_con_his($id_con)
    {
        $get_con_his = ControlHistory::where('id_con', $id_con)->get();
        foreach ($get_con_his as $i=> $item) {
            $i++;
            echo "<tr>";
            echo "<td>".$i."</td>";
//            echo "<td>".$item->controller->user->full_name."</td>";
            echo "<td>";
            if ($item->controller->name_con == null) {
                echo $item->controller->id_devi;
            } else {
                echo $item->controller->name_con;
            }
            echo "</td>";
            echo "<td>".$item->con_time."</td>";
            echo "<td>".$item->value_input."</td>";
            echo "</tr>";
        }
    }
}
