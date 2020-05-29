<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folio extends Model
{
  use SoftDeletes;

  protected $fillable = [ 'idLectura', 'description' ];

  protected $hidden =
  [
      'created_at', 'updated_at', 'deleted_at'
  ];

}
