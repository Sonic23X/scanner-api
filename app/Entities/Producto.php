<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
  use SoftDeletes;

  protected $fillable =
  [
    'description', 'idMedida', 'idEmpresa',
    'qty', 'serie', 'caducidad', 'id'
  ];

  protected $hidden =
  [
      'created_at', 'updated_at', 'deleted_at'
  ];
}
