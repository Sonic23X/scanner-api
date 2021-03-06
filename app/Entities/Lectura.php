<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lectura extends Model
{
  use SoftDeletes;

  protected $fillable =
  [
    'idProducto', 'lat', 'lon', 'idArea', 'idEmpresa', 'idUser',
    'idProceso'
  ];

  protected $hidden =
  [
      'updated_at', 'deleted_at'
  ];

}
