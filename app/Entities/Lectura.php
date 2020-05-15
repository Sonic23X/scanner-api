<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lectura extends Model
{
  use SoftDeletes;

  protected $fillable =
  [
    'idProducto', 'description', 'qty', 'idMedida',
    'gps', 'idArea', 'idEmpresa', 'idUser'
  ];

  protected $hidden =
  [
      'updated_at', 'deleted_at'
  ];

}
