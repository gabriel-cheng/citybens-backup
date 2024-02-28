<section id="blog">
    <div class="content container pt-5">
        <div class="fique-por-dentro">
            <div class="top pl-4 pt-5">
                <h1 class="mb-2">fique por dentro</h1>
                <h2>Blog citybens</h2>
            </div>
            <ul class="list-posts p-3">
                @forelse ($posts as $post)
                    @if ($loop->first)
                        @continue;
                    @endif

                    <li class="post">
                        <a href="{{ route('post', $post->slug) }}" class="d-flex align-items-center mb-4">
                            <div class="thumbnail mr-3">
                                <img src="{{ $post->getCoverPath() }}" alt="{{ $post->title }}">
                            </div>

                            <div class="sobre-post w-100">
                                <span class="data">{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                                <h1 class="previa mt-2">{{ $post->title }}</h1>
                                <p>{{ $post->short_description}}</p>
                            </div>
                        </a>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>

        @forelse ($posts as $post)
            @if ($loop->first)
                <div class="como-funciona">
                    <div class="capa">
                        <img class="img-fluid" src="{{ $post->getCoverPath() }}" alt="{{ $post->title }}" srcset="">
                    </div>

                    <div class="como-funciona-content p-3">
                        <span class="data">{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                        <h1 class="my-3">{{ $post->title }}</h1>
                        <p class="pb-3 mb-3 w-100">{{ $post->short_description }}</p>

                        <a href="{{ route('post', $post->slug)}}" class="btn-ver-blog p-2 d-flex align-items-center justify-content-center">
                            <span>ver blog</span>
                            <img class="ml-2" src="{{ asset('images/gerais/seta.png') }}" alt="Ir">
                        </a>
                    </div>
                </div>
            @else
                @break;
            @endif
        @empty
        @endforelse
    </div>
</section>
