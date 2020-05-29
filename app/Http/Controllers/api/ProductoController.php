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
  public function get( $id )
  {
    $producto = Producto::find( $id );

    if ( $producto != null )
      return response()->json( [ 'search' => true, 'data' => $producto ], 200 );
    else
      return response()->json( [ 'search' => false, 'data' => null ], 200 );
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
