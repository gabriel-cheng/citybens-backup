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

    <section id="post-single-page-post">

        <div class="content container py-5">
            <div class="sobre-post">
                <span class="data mb-3">{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                <div class="tags d-flex flex-wrap my-4">
                    @forelse ($post->tags()->get() as $tag)
                        <span class="tag px-3 py-2" style="background-color: {{ $tag->background_color }}
                            !important; color: {{ $tag->text_color }} !important">
                                {{ $tag->name }}
                        </span>
                    @empty
                    @endforelse
                </div>
                <h1>{{ $post->title }}</h1>
                <div class="text-center">
                    <img class="img-fluid" src="{{ $post->getCoverPath() }}" alt="img-post">
                </div>
                {!! $post->description !!}
            </div>

            {{--<div class="d-flex justify-content-center mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Anteriores</a></li>
                      <li class="page-item"><a class="page-link" href="#">Próximos</a></li>
                    </ul>
                </nav>
            </div> --}}
        </div>

    </section>

    @include('site.includes.footer')
    <script src="{{ mix('js/site/app.js') }}"></script>
</body>

</html>
