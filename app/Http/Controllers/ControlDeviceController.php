<?php

namespace App\Http\Controllers;

use App\Models\ControlHistory;
use App\Models\DataUpHistory;
use App\Models\Device;
use App\Models\ModelController;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
date_default_timezone_set('Asia/Ho_Chi_Minh');
class ControlDeviceController extends Controller
{
    public function list_device($id_room)
    {
        $get_controller = ModelController::where('id_room', $id_room)->groupBy('id_devi')->get();
        return view('control_device.control-device', compact('get_controller'));
    }

    public function control_checkbox($id_con, $value)
    {
//        dd();
        ControlHistory::insert(['id_con'=>$id_con,'con_time'=>date('Y/m/d h:i:sa'),'value_input'=>$value]);
        echo "Success control";
    }
    public function control_range($id_con, $value)
    {
        ControlHistory::insert(['id_con'=>$id_con,'con_time'=>date('Y/m/d h:i:sa'),'value_input'=>$value]);
        echo "Success control";
    }
     public function control_devie_share($id_controller){
        $get_con= ModelController::where('id_con',$id_controller)->first();
        return view('control_device.control_device_share',compact('get_con'));
     }

    public  function api($id_devi,$value){
        Device::where('id_devi',$id_devi)->update(['devi_value'=>$value]);
        DataUpHistory::insert(['id_devi'=>$id_devi,'dt_up'=>date('Y/m/d h:i:sa'),'value_up'=>$value]);
    }
}
