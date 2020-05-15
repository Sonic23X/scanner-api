<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
  use SoftDeletes;

  protected $fillable = [ 'description' ];

  protected $hidden =
  [
      'created_at', 'updated_at', 'deleted_at'
  ];

}
