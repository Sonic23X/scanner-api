<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Get all the resources in storage.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function get( $folder, $id, $name )
    {
      return Storage::download( 'public/' . $folder . '/' . $id . '/' . $name );
    }

}
