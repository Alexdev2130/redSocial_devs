<div>
    @if ($posts->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href=" {{route('posts.show', ['user' => $post->user, 'post' => $post])}} ">
                        <img src="/uploads/{{$post->imagen}}" alt="Imagen del Post {{$post->titulo}} ">
                    </a>
                </div>
            @endforeach
        </div>

    @else
        <p class="text-center">No hay posts</p>
    @endif
</div>
