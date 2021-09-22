<x-app>
    <div class="container mt-5">
        <h1>Blog</h1>
        <br>

        @unless($posts->count())
            No blog posts...
        @else

            <!-- start looping in all posts -->
            @foreach($posts as $meta)
                <div class="py-2">
                    <div class="text-dark text-muted mb-0">{{ $meta->date->format('d M, Y')}}</div>

                    <a href="/{{ $meta->slug }}">
                        <h2 class="mb-3 antialiased text-blue-dark hover:text-blue">{{ $meta->title }}</h2>
                    </a>
                </div>
                <hr>
            @endforeach
            <!-- end looping in all posts -->

            <br>
            {!! $posts->links() !!}
        @endif
    </div>
</x-app>
