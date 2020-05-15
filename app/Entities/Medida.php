<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medida extends Model
{
  use SoftDeletes;

  protected $fillable = [ 'description', 'factor' ];

  protected $hidden =
  [
      'created_at', 'updated_at', 'deleted_at'
  ];

}
