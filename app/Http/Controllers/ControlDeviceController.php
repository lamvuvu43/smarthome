<?php

namespace App\Http\Controllers;

use App\Models\ModelController;
use Illuminate\Http\Request;

class ControlDeviceController extends Controller
{
    public function list_device($id_room){
        $get_controller=ModelController::where('id_room',$id_room)->groupBy('id_devi')->get();
        return view('control-device',compact('get_controller'));
    }
}
