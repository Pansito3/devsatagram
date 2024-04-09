<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
       $manager = new ImageManager(new Driver());
       $imagen = $request->file('file');
       $nombreImagen = Str::uuid() . ".".$imagen->extension();

        $image = $manager->read($imagen);

        $image->crop(1000,1000);
        $imagenPath = public_path('uploads').'/'.$nombreImagen;
        $image->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);

    }
}
