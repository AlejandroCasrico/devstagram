@extends('layouts.app')

@section('title')
Register on devstagram
@endsection

@section('content')
<div class="md:flex md:justify-center md:gap-10 md:items-center ">
    <div class="p-5 md:w-6/2">
        <img src="{{ asset('img/registrar.jpg') }}" alt="registro-image">
    </div>
    <div class="p-6 bg-white rounded-lg shadow md:w-1/2">
        <form method="POST" action="{{ route('register')}}" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 font-bold text-gray-500 uppercase">Name</label>
                <input id="name" name="name" type="text" placeholder="your name" class="w-full p-3 border rounded-lg
                    @error('name') border-red-500" @enderror value="{{ old('name') }}">
                @error('name')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="username" class="block mb-2 font-bold text-gray-500 uppercase">Username</label>
                <input id="username" name="username" type="text" placeholder="your username"
                    class="w-full p-3 border rounded-lg @error('username') border-red-500" @enderror
                    value="{{ old('username') }}">
                @error('username')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 font-bold text-gray-500 uppercase">Email</label>
                <input id="email" name="email" type="email" placeholder="your email"
                    class="w-full p-3 border rounded-lg @error('email') border-red-500" @enderror
                    value="{{ old('email') }}">
                @error('email')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 font-bold text-gray-500 uppercase">Password</label>
                <input id="password" name="password" type="password" placeholder="your password"
                    class="w-full p-3 border rounded-lg @error('password') border-red-500" @enderror>
                @error('password')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 font-bold text-gray-500 uppercase">Repetir
                    Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="repeat password" class="w-full p-3 border rounded-lg">
            </div>

            <input type="submit"
                class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                value="Create account" />
        </form>
    </div>
</div>
@endsection