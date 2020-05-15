<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Lectura;

class LecturaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $lectura = $request->validate([
          'idProducto' => 'required',
          'description' => 'required',
          'qty' => 'required',
          'idMedida' => 'required',
          'gps' => 'required',
          'idArea' => 'required',
          'idEmpresa' => 'required',
          'idUser' => 'required'
      ]);

      Lectura::create($lectura);

      return response()->json(array('message' => 'Lectura creada'), 201);
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
      $lectura = $request->validate([
          'idProducto' => 'required',
          'description' => 'required',
          'qty' => 'required',
          'idMedida' => 'required',
          'gps' => 'required',
          'idArea' => 'required',
          'idEmpresa' => 'required',
          'idUser' => 'required'
      ]);

      Lectura::findOrFail($id)->update($lectura);

      return response()->json(array('message' => 'Lectura actualizada'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Lectura::findOrFail($id)->delete();
      return response()->json(array('message' => 'Lectura eliminada'), 200);
    }
}
