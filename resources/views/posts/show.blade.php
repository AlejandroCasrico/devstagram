@extends('layouts.app');


@section('title')

{{ $post->title }}
@endsection



@section('content')
<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
        <img src="{{ asset('uploads').'/'.$post->imagen }}" alt="Imagen {{ $post->title }}">
    </div>
    <div class="flex items-center gap-4 p-3">
        @auth

        <livewire:like-post :post="$post" />
        @endauth
    </div>
    <div>
        <p class="font-bold">{{ $post->user->username }}</p>
        <p class="text-sm text-gray-500">
            {{ $post->created_at->diffForHumans() }}
        </p>
    </div>
    @auth
    @if ($post->user_id === auth()->user()->id)
    <form action="{{ route('posts.destroy',$post) }}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" class="p-2 text-white bg-red-500 rounded hover:bg-red-600" />
    </form>
    @endif

    @endauth

    <div class="p-5 md:w-1/2">
        <div class="p-5 mb-5 bg-white shadow">
            @auth()
            <p class="mb-4 text-xl font-bold text-center">
                Add new comment
            </p>
            <form action="{{ route('comentarios.store',['post'=>$post,'user'=>$user]) }}" method="POST">
                @csrf
                <div class="mb-5">
                    @if (session('mensaje'))
                    <div class="p-2 mb-6 text-center text-white uppercase bg-green-500 rounded-lg">{{ session('mensaje')
                        }}</div>
                    @endif
                    <label for="comment" class="block mb-2 font-bold text-gray-500 uppercase">Add Comment</label>
                    <textarea id="comment" name="comment" placeholder="Add comments"
                        class="w-full p-3 border rounded-lg @error('description') border-red-500 @enderror"></textarea>
                    @error('comment')
                    <p class="p-2 my-2 text-sm text-center text-white bg-red-500 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit"
                    class="w-full p-3 font-bold text-white uppercase transition-colors rounded-lg cursor-pointer bg-sky-600 hover:bg-sky-700"
                    value="Comment" />
            </form>

            @endauth
            <div class="mt-10 mb-5 overflow-y-scroll bg-white shadow mx-h-96">
                @if ($post->comentarios->count())
                @foreach ($post->comentarios as $comentario )
                <div class="p-5 bg-gray-300 norder-b">
                    <a href="{{ route('posts.index',$comentario->user) }}">{{ $comentario->username }}</a>
                    <p>{{ $comentario->comentario }}</p>
                    <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans }}</p>
                </div>
                @endforeach
                @else
                <p class="p-10 text-center">No hay comentarios</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection