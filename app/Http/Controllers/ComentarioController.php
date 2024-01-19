<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user,Post $post)
        {
            $this->validate($request,[
                'comentario'=>'required|max:255'
            ]);
            //alamacenar el resultado
            Comentario::created([
                //solo usuarios authenticados pueden comentar
                'user_id'=>auth()->user()->id,
                'post_id'=>$post->id,
                'comment' => $request->comentario,
            ]);
            return back()->with('mensaje','comentario realizado!');
        }

}