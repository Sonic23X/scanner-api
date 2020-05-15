<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Proceso;

class ProcesoController extends Controller
{

    /**
     * Get all the resources in storage.
     * @param  int  $idEmpresa
     * @return \Illuminate\Http\Response
     */
    public function get($idEmpresa)
    {
      return response()->json(Proceso::where('idEmpresa', $idEmpresa), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $proceso = $request->validate([
          'description' => 'required',
          'idEmpresa' => 'required',
      ]);

      Proceso::create($proceso);

      return response()->json(array('message' => 'Proceso creado'), 201);
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
      $proceso = $request->validate([
          'description' => 'required',
          'idEmpresa' => 'required',
      ]);

      //Save de product
      Proceso::findOrFail($id)->update($proceso);

      return response()->json(array('message' => 'Proceso actualizado'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Proceso::findOrFail($id)->delete();
      return response()->json(array('message' => 'Proceso eliminado'), 200);
    }
}
