<div>
    @if ($posts->count())
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 xl:rid-cols-4">
        @foreach ($posts as $post)
        <div>
            <a href="{{ route('post.show',['post'=>$post,'user'=>$post->user]) }}">
                <img src="{{asset('uploads').'/'. $post->imagen }}" alt="mypost">{{ $post->title }}</img>
            </a>
        </div>
        @endforeach
    </div>
    <div class="my-10">
        {{ $posts ->links('pagination::simple-tailwind') }}
    </div>
    @else
    <h1>No hay post</h1>
    @endif
</div>