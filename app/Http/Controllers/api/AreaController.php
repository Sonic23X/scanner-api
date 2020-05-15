<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Area;

class AreaController extends Controller
{
    /**
     * Get all the resources in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
      return response()->json(Area::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $area = $request->validate([
          'description' => 'required',
      ]);

      Area::create($area);

      return response()->json(array('message' => 'Area creada'), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $area = $request->validate([
          'description' => 'required',
      ]);

      Area::findOrFail($id)->update($area);

      return response()->json(array('message' => 'Area actualizada'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Area::findOrFail($id)->delete();
      return response()->json(array('message' => 'Area eliminada'), 200);
    }
}
