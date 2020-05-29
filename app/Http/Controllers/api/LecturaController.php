<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Lectura;
use App\Entities\Producto;
use App\Entities\Folio;

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
          'lat' => 'required',
          'lon' => 'required',
          'idArea' => 'required',
          'idEmpresa' => 'required',
          'idUser' => 'required',
          'idProceso' => 'required'
      ]);

      $producto = $request->validate([
          'description' => 'required',
          'qty' => 'required',
          'idMedida' => 'required',
          'serie' => 'required',
          'caducidad' => 'required',
          'idEmpresa' => 'required',
      ]);

      $product;
      $folio_desc;

      if ( $request->has( 'idProducto' ) )
      {
        $product = Producto::find($request[ 'idProducto' ]);
        $product->description = $producto[ 'description' ];
        $product->idMedida = $producto[ 'idMedida' ];
        $product->idEmpresa = $producto[ 'idEmpresa' ];
        $product->qty = $producto[ 'qty' ];
        $product->serie = $producto[ 'serie' ];
        $product->caducidad = $producto[ 'caducidad' ];
        $product->save();

        $folio_desc = 'Producto escaneado/actualizado';
      }
      else
      {
        $product = Producto::create( $producto );

        $folio_desc = 'Producto creado';
      }

      //guardamos las imagenes
      $i = 0;
      $image = "file_";
      $fotos = [];

      while ($request->has($image . $i))
      {
        $file = $request->file($image . $i);
        $fotos[] = $file->store('producto/'. $product->id .'', 'public');
        $i++;
      }

      $product->images = $fotos;
      $product->save();

      //generamos la lectura
      $lectura[ 'idProducto' ] = $product->id;

      $reporte = Lectura::create( $lectura );

      $folio = [ 'idLectura' => $reporte->id, 'description' => $folio_desc ];

      $newFolio = Folio::create( $folio );

      return response()->json( [ 'Folio' => $newFolio ], 200);

    }


}
