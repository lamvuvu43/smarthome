<?php

namespace App\Http\Controllers;

use App\Models\Floor;

use App\Models\Module;

use App\Models\Room;
use App\Models\ModelController;
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
        return view('add_device');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controller = ModelController::where('id_user', Auth::id())->get();
        return view('edit_device', compact('controller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        //thực hiện truy vấn bảng module để lấy id module lưu vào controller thông qua mac khách nhập
        $id_mod = Module::where('mac', '=', $request->mac)->get();
//        dd(count($id_mod));
//        ModelController::insert(['id_mod' => $id_mod->id, 'id_room' => $request->select_room, 'id_user' => Auth::id(), 'id_per' => $request->permission, 'name_con' => $request->name_controller]);
        if (count($id_mod) != 0) {
            foreach ($id_mod as $item) {
                ModelController::insert(['id_mod' => $item->id, 'id_user' => Auth::id(), 'id_per' => 3]);
            }
            return redirect()->back()->with('add_success', 'Bạn đang thêm thành công thiết bị');
        } else {
            return redirect()->back()->with('error_mac', 'Thiết bị bạn nhập không tồn
                                tại.<br> Vui lòng kiểm tra lại');
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getfloor($id)
    {
        $floor = Floor::where('id_house', $id)->get();
        foreach ($floor as $item) {
            echo "<option value='" . $item->id . "'>" . $item->name_floor . "</option>";
        }
    }

    public function getroom($id)
    {
        $room = Room::where('id_floor', $id)->get();
        foreach ($room as $item) {
            echo "<option value='" . $item->id . "'>" . $item->name_room . "</option>";
        }
    }
}
