<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\registerController;
use App\Livewire\LikePost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//ruta con metodo invocable(cuando solo se va a tener una funcion)
Route::get('/',HomeController::class)->name('home');

Route::get('/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');

Route::get('/register',[registerController::class,'index'])->name('register');
Route::post('/register',[registerController::class,'store']);

Route::get('/login',[loginController::class,'index'])->name('login');
Route::post('/login',[loginController::class,'store']);

Route::post('/logout',[logoutController::class,'store'])->name('logout');


Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentarios.store');

Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('post.show');


Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

Route::delete('/posts/{post}',[ComentarioController::class,'destroy' ])->name('posts.destroy');


//like a fotos
Route::post('/posts/{posts}/likes',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/posts/{posts}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');

//perfil

//siguiendo usuarios
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');