<?php

namespace App\Http\Controllers;

use App\Models\DetailOfProduct;
use App\Models\Floor;

use App\Models\Device;

use App\Models\House;
use App\Models\Permission;
use App\Models\Room;
use App\Models\ModelController;
use App\Models\User;
use Highlight\Mode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('device.add_device');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controller = ModelController::where('id_user', Auth::id())->get();
//        dd($controller);
        return view('device.list_device', compact('controller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_mac = DetailOfProduct::where('mac', $request['mac'])->first();
        if ($check_mac != null) {
            if ($check_mac->id_stt != 2) {
                $id_mod = Device::where('mac', '=', $request['mac'])->get();
//        DetailOfProduct::where('mac',$request['mac'])->update(['id_stt'=>'2']);

                if (count($id_mod) != 0) {
                    foreach ($id_mod as $item) {
//                dd($item->id_devi);
                        ModelController::insert(['id_devi' => $item->id_devi, 'id_user' => Auth::id(), 'id_per' => '3']);
                    }
                    DetailOfProduct::where('mac', $request['mac'])->update(['id_stt' => '2']);
                    return redirect()->back()->with('add_success', 'Bạn đang thêm thành công thiết bị');
                } else {
                    return redirect()->back()->with('error_mac', 'Thiết bị bạn nhập không tồn
                                tại.Hoặc đã có người sử dụng Vui lòng kiểm tra lại');
                }
            } else {
                return redirect()->back()->with('error_mac', 'Thiết bị bạn nhập không tồn
                                tại.Hoặc đã có người sử dụng Vui lòng kiểm tra lại');
            }
        } else {
            return redirect()->back()->with('error_mac', 'Thiết bị bạn nhập không tồn
                                tại.Hoặc đã có người sử dụng Vui lòng kiểm tra lại');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_controller = ModelController::where('id_con', $id)->first();
        $get_house = House::where('id_user', Auth::id())->get();
        return view('device.edit_device', compact('get_controller', 'get_house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        dd($request->all());

        ModelController::where('id_devi', $request['id_devi'])->update(['id_room' => $request['select_room'], 'name_con' => $request['name_devi']]);
        return redirect()->route('list_device.show')->with('add_success', 'Đã cập thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // chưa xử lý xong đợi. ý kiến anh lộc
        $get_id_devi = ModelController::where('id_con', $id)->first();

        $get_mac = Device::where('id_devi', $get_id_devi->id_devi)->first();

        $get_id_devi_by_mac = Device::where('mac', $get_mac->mac)->get();

        foreach ($get_id_devi_by_mac as $item) {
            ModelController::where('id_devi', $item->id_devi)->delete();
//            echo $item->id_devi;
//            break;
        }
        DetailOfProduct::where('mac', $get_mac->mac)->update(['id_stt' => '0']);
//        ModelController::where('id_con',$id )->where('id_per',Auth::id())->delete();
        // cửa sở hữu có quyền xoá thiết bị khỏi controller.
        // Sau khi xoá update lại cột id_stt = 0 trong bảng detailofproduct
        echo "Đã xoá thành công";

    }

    public function getfloor($id)
    {
        $floor = Floor::where('id_house', $id)->get();
        foreach ($floor as $item) {
            echo "<option value='" . $item->id_floor . "'>" . $item->name_floor . "</option>";
        }
    }

    public function getroom($id)
    {
        $room = Room::where('id_floor', $id)->get();
        foreach ($room as $item) {
            echo "<option value='" . $item->id_room . "'>" . $item->name_room . "</option>";
        }
    }

    public function get_amount_share($id_devi)
    {
        $get_amout = ModelController::where('id_devi', '=', $id_devi)->where('id_user', '!=', Auth::id())->where('id_per', '!=', '3')->get();
        echo count($get_amout);
//        echo $get_amout;
    }

    public function list_share($id_devi)
    {
        $check_per = ModelController::where('id_user', Auth::id())->where('id_devi', $id_devi)->first();
        if ($check_per == null) {
            return redirect()->route('logout');
        }
        $list_share = ModelController::where('id_devi', '=', $id_devi)->where('id_per', '!=', '3')->get();

        return view('share.list_device_share', compact('list_share', 'check_per'));
    }

    public function show_form_devi($id_con)
    {
        $get_per = Permission::where('id_per', '!=', '3')->get();
        $get_controller = ModelController::where('id_con', $id_con)->first();
        return view('share.form_edit_device_share', compact('get_controller', 'get_per'));
    }

    public function update_share_device(Request $request, $id)
    {
//        dd($request->all());
        ModelController::where('id_con', $id)->update(['id_per' => $request['id_per']]);
        return redirect()->route('list.share.show', $request['id_devi'])->with('add_success', 'Đã cập nhật quyền thành công');
    }

    public function delete_device_share($id_devi, $id_user)
    {
        ModelController::where('id_devi', $id_devi)->where('id_user', $id_user)->delete();
        echo " Đã xoá thành công";
    }

    public function show_form_share($id_con)
    {
        $get_controller = ModelController::where('id_con', $id_con)->first();
        $user = User::where('id', '!=', Auth::id())->get();
        $get_per = Permission::where('id_per', '!=', '3')->orderBy('id_per', 'DESC')->get();;
        return view('share.show_form_share', compact('get_controller', 'user', 'get_per'));
    }

    public function show_form_share_process(Request $request, $id_con)
    {
//        dd($request->all());
        ModelController::insert(['id_user'=>$request['id_user'],'id_per'=>$request['id_per'],'id_devi'=>$request['id_devi']]);
        return redirect()->route('list_device.show')->with('add_success', 'Đã chia sẽ thiết bị thành công');
    }

}
