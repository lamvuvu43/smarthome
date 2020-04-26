<?php

namespace App\Http\Controllers;

use App\Models\ControlHistory;
use App\Models\DataUpHistory;
use App\Models\Device;
use App\Models\ModelController;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class ControlDeviceController extends Controller
{
    public function list_device($id_room)
    {
        $get_controller = ModelController::where('id_room', $id_room)->groupBy('id_devi')->get();
        return view('control-device', compact('get_controller'));
    }

    public function control_checkbox($id_con, $value)
    {
        ControlHistory::insert(['id_con'=>$id_con,'con_time'=>date('Y/m/d h:i:sa'),'value_input'=>$value]);
        echo "Success controll";
    }
    public function control_range($id_con, $value)
    {
        ControlHistory::insert(['id_con'=>$id_con,'con_time'=>date('Y/m/d h:i:sa'),'value_input'=>$value]);
        echo "Success controll";
    }
    public  function api($id_devi,$value){
        Device::where('id_devi',$id_devi)->update(['devi_value'=>$value]);
        DataUpHistory::insert(['id_devi'=>$id_devi,'dt_up'=>date('Y/m/d h:i:sa'),'value_up'=>$value]);
    }
}
