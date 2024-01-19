@extends('layouts.app')

@section('title')
Create new post
@endsection
@push('styles')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
<div class="md:flex md:items-center">
    <div class="px-10 md:w-1/2">
        <form id="dropzone" action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col items-center justify-center w-full border-2 border-dashed rounded dropzone h-96">
            @csrf
        </form>
    </div>

    <div class="p-10 mt-10 bg-white rounded-lg shadow-xl md:w-1/2 md:mt-0">
        <form method="POST" action="{{ route('posts.store') }}" novalidate enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 font-bold text-gray-500 uppercase">Title</label>
                <input id="title" name="title" type="text" placeholder="post title"
                    class="w-full p-3 border rounded-lg @error('title') border-red-500 @enderror"
                    value="{{ old('title') }}">
                @error('title')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 font-bold text-gray-500 uppercase">Description</label>
                <textarea id="description" name="description" placeholder="post description"
                    class="w-full p-3 border rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <input name="imagen" type="hidden" value="{{ old('imagen') }}" />
                @error('imagen')
                <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit"
                class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                value="Create post" />
        </form>
    </div>
</div>
@endsection