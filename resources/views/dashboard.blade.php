@extends('layouts.app')

@section('title')
Perfil :{{$user->username }}
@endsection

@section('content')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
        <div class="px-5 md:w-8/12 lg:w-6/12">
            <img src="{{$user->imagen ? asset('perfiles').'/'.$user->imagen : asset('img/usuario.svg') }}"
                alt="imagen_usuario" />
        </div>
        <div class="px-5 py-10 md:w-8/12 lg:w-6/12 md:flex md:flex-col md:justify-center md:items-start">
            <div class="flex items-center gap-2">
                <p class="text-2xl text-gray-700">{{ $user->username }}</p>
                @auth
                @if ($user->id === auth()->user()->id)
                <a class="text-gray-500 cursor-pointer hover:text-gray-500" href="{{ route('perfil.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>

                </a>
                @endif
                @endauth
            </div>

            <p class="mb-3 text-sm font-bold text-gray-800">
                {{ $user->followers->count() }}
                <span class="font-normal">@choice('follower|followers', $user->followers->count())</span>
            </p>
            <p class="mb-3 text-sm font-bold text-gray-800">
                {{ $user->followings->count() }}
                <span class="font-normal">Follows<span>
            </p>
            <p class="mb-3 text-sm font-bold text-gray-800">
                {{ $user->posts->count() }}
                <span class="font-normal">Post</span>

            </p>
            @auth
            @if ($user->id !== auth()->user()->id)
            @if (!$user->siguiendo(auth()->user()))


            <form action="{{ route('users.follow',$user) }}" method="POST">
                @csrf
                <input type="submit"
                    class="px-3 py-1 text-xs font-bold text-white uppercase bg-blue-600 rounded-lg cursor-pointer"
                    value="follow" />
            </form>
            @else
            <form action="{{ route('users.unfollow',$user) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit"
                    class="px-3 py-1 text-xs font-bold text-white uppercase bg-red-600 rounded-lg cursor-pointer"
                    value="unfollow" />
            </form>
            @endif
            @endif
            @endauth

        </div>
    </div>
</div>
<section class="container mx-auto mt-8">
    <h2 class="my-10 text-4xl font-black text-center">Publication</h2>
    <x-listar-post :posts='$posts' />
</section>
@endsection