<header id="header" class="">
    <div class="d-flex">
        <div class="header container-fluid py-5 d-flex flex-column justify-content-between">
            {{-- <nav class="container navbar navbar-expand-xl navbar-light justify-content-between"> --}}
            <nav class="container navbar navbar-light justify-content-between">
                <a href="" class="logo" title="Início">
                    <img src="{{ asset('images/logo/logo-branca.png') }}" alt="Logo">
                </a>


                <div class="container w-100 d-flex justify-content-end fixed " style="">
                    <div class="more-opcoes d-flex align-items-center" style="gap: 5px">
                        <a class="nav-link p-2 mx-2 d-flex align-items-center btn-yellow" target="_blank" href="https://citybensfranchising.com.br">Seja um franqueado</a>
                        <a class="nav-link p-2 mx-2 d-flex align-items-center btn-blue" id="abrir-modal">simule agora</a>
                    </div>
                    <button class="navbar-toggler align-self-start" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item px-2 align-self-end">
                                <a class="nav-link" href="#fale-conosco">Fale-conosco</a>
                            </li>
                            <li class="nav-item px-2 active align-self-end">
                                <a class="nav-link" href="#quem-somos"> Sobre nós </a>
                            </li>
                            <li class="nav-item px-2 align-self-end">
                                <a class="nav-link" href="#simular-consorcios"> Serviços </a>
                            </li>
                            <li class="nav-item px-2 align-self-end">
                                <a class="nav-link" href="{{ route('blog') }}"> Blog </a>
                            </li>
                        </ul>
                    </div>
                </div>




            </nav>

            <p class="slogan container">realize seus <br><span>sonhos</span> </p>

            <div class="saiba-mais d-flex flex-column align-items-center container">
                <span>saiba mais</span>
                <img class="mt-2" src="{{ asset('images/header/saiba-mais.png') }}" alt="">
            </div>
        </div>
        @include('site.includes.simulador')
    </div>
</header>
