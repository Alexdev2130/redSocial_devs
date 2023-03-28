<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user){

        $this->authorize('view', $user);

        return view('perfil.index',[
            'user' => $user
        ]);


    }


    public function store(Request $request){

        //MODIFICAR REQUEST
        $request->request->add(['username' => Str::slug($request->username)]);


        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3', 'max:20', 'not_in:editar-perfil,facebook,twitter'],
            'email' => ['required', 'email','unique:users,email,' . auth()->user()->id]
        ]);




        if($request->password){

            $this->validate($request, ['password' => 'min:6', 'password_nuevo' => 'min:6']);

            if (!auth()->attempt(['id' => auth()->user()->id, 'password' => $request->password])) {
                return back()->with('mensaje', 'La contraseña no coincide con la actual');
            }
        }


        if($request->imagen){

            if(auth()->user()->imagen){
                unlink(public_path('perfiles') . '/' . auth()->user()->imagen);
            }


            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' .  $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagePath = public_path('perfiles') . '/' . $nombreImagen;

            $imagenServidor->save($imagePath);

        }

        /**Guardar Cambios */

        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->password = Hash::make($request->password_nuevo);
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
