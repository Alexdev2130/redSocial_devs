<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){
        $post->likes()->create([
            'user_id' => $request->user()->id
            /**El 'post_id' se toma por implicito por la relacion de post y likes en el modelo Post */
        ]);

        return back();
    }


    public function destroy(Request $request, Post $post){
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
