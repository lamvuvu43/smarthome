<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        $room = Room::where('id_floor', $id)->get();

        if ($room != null) {
            foreach ($room as $item) {

                echo "  <div class=\"col-sm-12 col-md-6 col-lg-3 location loc-2 content-room \">
            <div class=\"location-content \">$item->name_room</div>
            <div class='id_room' style='display: none'>$item->id_room</div>
        </div>";

            }
        } else {
            echo "  <div class=\"col-sm-12 col-md-6 col-lg-3 location loc-2 \">
            <div class=\"location-content \">Hiện tại tầng này chưa có phòng</div>
        </div>";
        }


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

    public function list_room_edit($id_floor)
    {
        $get_floor = Floor::where('id_floor', $id_floor)->first();
        $get_room = Room::where('id_floor', $id_floor)->get();
        return view('room.list_room', compact('get_room','get_floor'));
    }

    public function show_room_edit($id_room)
    {
        $get_room = Room::where('id_room', $id_room)->first();
        return view('room.edit_room', compact('get_room'));
    }

    public function show_room_edit_process(Request $request, $id_room)
    {
//        dd($request->all());
        Room::where('id_room', $id_room)->update(['name_room' => $request['name_room']]);
        return redirect()->route('list_room_edit', $request['id_floor'])->with('update_success', 'Đã cập nhật phòng thành công');
    }
}
