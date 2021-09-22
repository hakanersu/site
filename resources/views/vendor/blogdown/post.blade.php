<x-app>
    @slot('title', $post->title)
    <div class="max-w-4xl mx-auto mb-12">
        <h1 class="text-3xl text-gray-200 font-bold mb-2">{{ $post->title }}</h1>
        <h3 class="text-2xl text-gray-600">{{ $post->summary }}</h3>
        <div class="mt-3">
            @foreach($post->tags as $tag)
                <span class="bg-yellow-500 text-sm text-yellow-900 px-3 py-1 rounded">{{ $tag }}</span>
            @endforeach
        </div>
    </div>

    <img class="mb-10" src="https://blog.elementary.io/images/elementary-os-6-odin-released/odin.png" alt="Feature image">

    <div class="max-w-4xl mx-auto prose lg:prose-xl">
        <div>
            @include($post->view())
        </div>
        <br>
        <hr class="mt-5">
        <h5>Other posts you might enjoy...</h5>
        @unless($others->count())
            No other posts...
        @else
        <!-- start looping in all posts -->
            @foreach($others as $post)
                <div class="py-2">
                    <div class="text-dark text-muted mb-0">{{ $post->date->format('d M, Y')}}</div>
                    <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                </div>
            @endforeach
        <!-- end looping in all posts -->
        @endif
        <br>
    </div>
</x-app>
