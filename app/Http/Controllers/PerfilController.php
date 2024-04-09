<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PerfilController extends Controller
{
    //
    public function __construct()
    {
        ///para proteger el enlace
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        ///modificar el reques.. para el usuario duplicado
        $request->request->add(['username'=> Str::slug($request->username)]);
        ///solo se hace si es la ultima opcion
        ///
        
        $this->validate($request, [
            'username' => ['required','unique:users,username, '.auth()->user()->id,'min:3','max:20',
                          'not_in:twitter,editar-perfil',
                        ], ///si tenemos mas de 3 cosas que validar lo recomendable es mandarlo como arreglo

        ]);
        $usuario = User::find(auth()->user()->id);
        if($request->imagen)
        {
                $imgPath = public_path('perfiles/'.$usuario->imagen);
    
                if(File::exists($imgPath) && $imgPath !== "/var/www/html/public/perfiles/" )
                {   
                    unlink($imgPath);
                    
                }
                   $manager = new ImageManager(new Driver());
                $imagen = $request->file('file');
                $nombreImagen = Str::uuid() . ".".$request->imagen->extension();

                    $image = $manager->read($request->imagen);

                    $image->crop(1000,1000);
                    $imagenPath = public_path('perfiles').'/'.$nombreImagen;
                    $image->save($imagenPath);
        }

        //guardar cambios
        
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->save();

        //redireccionando 
        return redirect()->route('posts.index', $usuario->username);
    }
}
