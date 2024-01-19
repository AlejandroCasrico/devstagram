<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        //protege el acceso los metodos  debajo o de los especificos usando except
        $this->middleware('auth')->except(['show','index']);
    }
    public function index(User $user){
        $post = Post::where('user_id',$user->user_id)->paginate(5);
        return view('dashboard',[
            'user'=>$user,
            'post'=>$post
        ]);
    }
    public function store(Request $request)
    {

       $this->validate($request,[
        'title' => 'required|max:255',
        'description' => 'required',
        'imagen'=>'required'
       ]);
       //sin relaciones
    //    Post::create([
    //     'title'=>$request->title,
    //     'description'=>$request->description,
    //     'imagen'=>$request->imagen,
    //     'user_id'=>auth()->user()->id
    //    ]);
    //creando post con relaciones
    $request->user()->posts()->create([
        'title'=>$request->title,
         'description'=>$request->description,
        'imagen'=>$request->imagen,
        'user_id'=>auth()->user()->id
    ]);
       return redirect()->route('posts.index',auth()->user()->username);
    }
    public function create(){

        return view('posts.create');
    }

    public function show(Post $post,User $user)
    {

        return view('posts.show',[
            'post'=>$post,
            'user'=>$user
        ]);
    }

    public function destroy(Post $post)
    {
       $this->authorize('delete',$post);
       $post->delete();
       //eliminar imagen
       $imagen_path = public_path('uploads/'.$post->imagen);

       if(File::exists($imagen_path)){
            unlink($imagen_path);
       }
       return redirect()->route('posts.index',auth()->user()->username);
    }

}