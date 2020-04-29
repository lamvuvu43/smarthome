<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MQTTController extends Controller
{
    public  function mqtt(Request $request){
//        dd($request->all());
        return view('mqtt.WEB_Publish');
    }
}
