@extends('layouts.app')

@section('title')
Editar Perfil {{ auth()->user()->username }}
@endsection


@section('content')
<div class="md:flex md:justify-center">
    <div class="p-6 bg-white shadow md:w-1/2">
        <form class="mt-10 md:mt-0" method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">Username</label>
                <input id="username" name="username" type="text" placeholder="your username" class="w-full p-3 border rounded-lg
                    @error('username') border-red-500" @enderror value="{{ auth()->user()->username }}">
                @error('name')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">email</label>
                <input id="email" name="email" type="email" placeholder="your email" class="w-full p-3 border rounded-lg
                    @error('email') border-red-500" @enderror value="{{ auth()->user()->email }}">
                @error('email')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" class="block mb-2 font-bold text-gray-500 uppercase">Imagen perfil</label>
                <input id="imagen" name="imagen" type="file" class="w-full p-3 border rounded-lg
                    accept=" .png,.jpg,jpeg">
            </div>
            <input type="submit"
                class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                value="Guardar cambios" />
        </form>
    </div>
</div>
@endsection