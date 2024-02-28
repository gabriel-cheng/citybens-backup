<header id="header" class="header-blog">
    <div class="d-flex">
        <div class="header container-fluid py-4 d-flex flex-column justify-content-between">
            {{-- <nav class="container navbar navbar-expand-xl navbar-light justify-content-between"> --}}
            <nav class="container navbar navbar-light justify-content-between">
                <a href="{{ route('home') }}" class="logo" title="Início">
                    <img src="{{ asset('images/logo/logo-branca.png') }}" alt="Logo">
                </a>


                <div class="container w-100 d-flex justify-content-end fixed" style="">
                    <div class="more-opcoes d-flex align-items-center" style="gap: 5px">
                        <a class="nav-link p-2 mx-2 d-flex align-items-center btn-yellow" href="">Seja um franqueado</a>
                        <a class="nav-link p-2 mx-2 d-flex align-items-center btn-blue" id="abrir-modal" target="_blank" href="citybensfranchising.com.br">simule agora</a>
                    </div>
                    <button class="navbar-toggler align-self-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
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
        </div>
        @include('site.includes.simulador')
    </div>
</header>
