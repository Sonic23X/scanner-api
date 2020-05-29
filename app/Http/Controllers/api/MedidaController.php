<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Medida;

class MedidaController extends Controller
{
    /**
     * Get a resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
      return response()->json(Medida::all(), 200);
    }

    /**
     * Get a resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get( $id )
    {
      return response()->json(Medida::findOrFail( $id ), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $medida = $request->validate([
          'description' => 'required',
          'factor' => 'required',
      ]);

      Medida::create($medida);

      return response()->json(array('message' => 'Medida creada'), 201);
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
      $medida = $request->validate([
          'description' => 'required',
          'factor' => 'required',
      ]);

      Medida::findOrFail($id)->update($medida);

      return response()->json(array('message' => 'Medida actualizada'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Medida::findOrFail($id)->delete();
      return response()->json(array('message' => 'Medida eliminada'), 200);
    }
}
