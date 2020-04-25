<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\House;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('house.form_add_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        dd($request->All());
//        dd($request['floor'][0]);
        $id_hosue = House::insertGetId(['id_user' => Auth::id(), 'name_house' => $request['house']]);
        if ($request['floor'][0] == null) {
            Floor::insert(['id_house' => $id_hosue, 'name_floor' => 'Tầng trệt']);
        } else {
            for ($i = 0; $i < count($request['floor']); $i++) {
                Floor::insert(['id_house' => $id_hosue, 'name_floor' => $request['floor'][$i]]);
            }
        }
        return redirect()->route('show_form_room');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //        -------------------------lấy nhà của người đang đăng nhập-----------------
        $house = House::where('id_user', Auth::id())->get();
//        --------------------------------------------------------
        return view('list_home', compact('house'));
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

    public function get_floor($id_house)
    {
        $get_floor = Floor::where('id_house', $id_house)->get();
        foreach ($get_floor as $item) {
            echo "<option value='$item->id_floor '> $item->name_floor  </option>";
        }


    }

    public function show_form_room()
    {
        $get_house = House::where('id_user', Auth::id())->orderBy('id_house','DESC')->get();
        return view('room.form_add_room', compact('get_house'));
    }

    public function create_room(Request $request)
    {
        for ($i = 0; $i < count($request['name_room']); $i++) {
            Room::insert(['id_floor' => $request['id_floor'], 'name_room' => $request['name_room'][$i]]);
        }
        return redirect()->back()->with('success', 'Đã thêm phòng thàng công');
    }

    public function get_room($id_floor)
    {
        $get_room = Room::where('id_floor', $id_floor)->get();
        echo "  <tr><th colspan=\"2\">Các phòng đã có </th></tr>
                        <tr><th>STT</th> <th>Tên Phòng</th></tr>";
        foreach ($get_room as $i => $item) {
            $i++;

            echo "<tr><td>$i</td><td>$item->name_room</td></tr>";
        }
    }

    public function list_house()
    {
//        dd('đã đến đây');
        $get_house = House::where('id_user', Auth::id())->get();
        return view('house.list_house', compact('get_house'));
    }

    public function show_edit_house($id)
    {
        $get_house = House::where('id_house', $id)->first();
        return view('house.edit_house', compact('get_house'));
    }

    public function edit_house_process(Request $request, $id)
    {
//        dd($request->all());
        House::where('id_house', $id)->update(['name_house' => $request['name_house']]);
        return redirect()->route('list_house.show')->with('update_success', 'Đã cập nhật tên ngôi nhà thành công');
    }
}
