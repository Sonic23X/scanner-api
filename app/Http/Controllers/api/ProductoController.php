<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Producto;

class ProductoController extends Controller
{

  /**
   * Get a resource in storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function get($id)
  {
    return response()->json(Producto::findOrFail($id), 200);
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $producto = $request->validate([
          'description' => 'required',
          'idMedida' => 'required',
          'idEmpresa' => 'required',
          'qty' => 'required',
          'serie' => 'required',
          'caducidad' => 'required|date'
      ]);

      Producto::create($producto);

      return response()->json(array('message' => 'Producto registrado'), 201);
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
      $producto = $request->validate([
          'description' => 'required',
          'idMedida' => 'required',
          'idEmpresa' => 'required',
          'qty' => 'required',
          'serie' => 'required',
          'caducidad' => 'required|date'
      ]);

      //Save de product
      Producto::findOrFail($id)->update($producto);

      return response()->json(array('message' => 'Producto actualizado'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Producto::findOrFail($id)->delete();
      return response()->json(array('message' => 'Producto eliminado'), 200);
    }
}
