<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/site/app.css') }}">
    {!! SEO::generate() !!}
    <link rel="icon" href="{{ asset('images/logo.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('images/logo.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/logo.png') }}">
</head>

<body>

    @include('site.includes.header-blog')

    <section id="list-posts-page-blog">

        <div class="content container py-5">
            <h1 class="mb-5">Blog <span>|</span> citybens</h1>

            <ul class="list-posts">
                @forelse ($posts as $post)
                    <li class="d-flex align-items-center mb-5">
                        <a href="{{ route('post', $post->slug) }}">
                            <img class="thumbnail-post" src="{{ $post->getCoverPath() }}" alt="">
                        </a>

                        <div class="sobre-post">
                            <span class="data mb-3">{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                            <div class="tags d-flex flex-wrap my-4">
                                @foreach ($post->tags()->get() as $tag)
                                    <span class="tag px-3 py-2" style="background-color: {{ $tag->background_color }}
                                        !important; color: {{ $tag->text_color }} !important">
                                          investimento
                                    </span>
                                @endforeach
                            </div>

                            <h3 class="h1">{{ $post->title }}</h3>
                            <p class="mt-4">{{ $post->short_description }}</p>

                            <a href="{{ route('post', $post->slug) }}" class="btn-continue-lendo d-flex align-items-center justify-content-center p-2 mt-2">
                                <span>continue lendo</span>
                                <img class="ml-2" src="{{ asset('images/simular-consorcios/seta.png') }}" alt="" srcset="">
                            </a>
                        </div>
                    </li>
                @empty
                    <p>Nenhum post publicado ainda.</p>
                @endforelse
            </ul>

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>

        </div>

    </section>

    @include('site.includes.footer')
    <script src="{{ mix('js/site/app.js') }}"></script>
</body>

</html>
