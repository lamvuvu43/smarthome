<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\House;
use Illuminate\Http\Request;

class FloorProcessController extends Controller
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
        $floor = Floor::where('id_house', $id)->get();
        return view('list_floor', compact('floor'));
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
       Floor::where('id_floor',$id)->delete();
    }

    public function list_floor_edit($id)
    {
        $get_house=House::where('id_house',$id)->first();
        $get_floor = Floor::where('id_house', $id)->get();
//        dd($get_floor);
        return view('floor.list_floor', compact('get_floor','get_house'));
    }

    public function show_floor_edit($id)
    {
        $get_floor = Floor::where('id_floor', $id)->first();
        return view('floor.edit_floor', compact('get_floor','get_floor'));
    }

    public function floor_edit_process(Request $request, $id)
    {
//        dd($request->all());
        Floor::where('id_floor', $id)->update(['name_floor' => $request['name_floor']]);
        return redirect()->route('list_floor_edit',$request['id_house'])->with('update_success','Đã cập nhật tên tầng thành công');
    }
}
