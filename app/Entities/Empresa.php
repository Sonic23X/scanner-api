<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
  use SoftDeletes;

  protected $fillable = [ 'name' ];

  protected $hidden =
  [
      'created_at', 'updated_at', 'deleted_at'
  ];

}
