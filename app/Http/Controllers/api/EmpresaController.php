<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Empresa;

class EmpresaController extends Controller
{
    /**
     * Get a resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
      return response()->json(Empresa::findOrFail($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $empresa = $request->validate([
          'name' => 'required',
      ]);

      Empresa::create($empresa);

      return response()->json(array('message' => 'Empresa creada'), 201);
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
      $empresa = $request->validate([
          'name' => 'required',
      ]);

      //Save de product
      Empresa::findOrFail($id)->update($empresa);

      return response()->json(array('message' => 'Empresa actualizada'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Empresa::findOrFail($id)->delete();
      return response()->json(array('message' => 'Empresa eliminada'), 200);
    }
}
