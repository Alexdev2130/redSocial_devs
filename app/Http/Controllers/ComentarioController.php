<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){

        /**VALIDAR */
        $this->validate($request, [
            'comentario'=>'required|max:255'
        ]);


        /**ALMACENAR */

        comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        /**REDIRIGIR */

        return back()->with('mensaje','comentario creado correctamente');
    }
}
