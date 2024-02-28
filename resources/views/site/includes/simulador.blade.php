<div class="modal-simulador p-2">
    <div class="content d-flex flex-column align-items-center">
        <a href="" id="fechar-modal" class="align-self-end d-flex align-items-center justify-content-center">
            <div></div>
            <div></div>
        </a>

        <div class="faca content-form d-flex align-items-center mt-4">
            <div class="img-smartphone mr-3">
                <img class="img-fluid" src="{{ asset('images/simulador/smartphone.png') }}" alt="">
            </div>

            <div class="text">
                <h1>simular <br> consórcio</h1>
                <p class="mt-3">Preencha os campos abaixo</p>
            </div>
        </div>

        <form action="" class="form-simulador d-flex flex-column content-form">
            <label for="tipo-consorcio" class="mb-2 mt-4">Selecione o tipo de consórcio que deseja simular:</label>
            <select name="tipo-consorcio" id="tipo-consorcio" class="w-100 p-1">
                <option value="" class="option d-flex align-items-center justify-content-center p-3" selected>Selecione
                    o tipo do consórcio</option>
                <option value="imovel" data-tipo-consorcio="Imóveis"
                    class="option d-flex align-items-center justify-content-center p-3">Imóveis</option>
                <option value="auto" data-tipo-consorcio="Automóveis"
                    class="option d-flex align-items-center justify-content-center p-3">Automóveis</option>
                <option value="moto" data-tipo-consorcio="Motos"
                    class="option d-flex align-items-center justify-content-center p-3">Motos</option>
                <option value="servicos" data-tipo-consorcio="Serviços"
                    class="option d-flex align-items-center justify-content-center p-3">Serviços</option>
                <option value="pesado" data-tipo-consorcio="pesados"
                    class="option d-flex align-items-center justify-content-center p-3">Pesados</option>
                <option value="eletro" data-tipo-consorcio="Eletroeletrônicos"
                    class="option d-flex align-items-center justify-content-center p-3">Eletroeletrônicos</option>
            </select>

            <div class="tipo-simulacao w-100 d-none">
                <h2 class="mb-2 mt-4">Como deseja simular:</h2>
                <div class="d-flex align-items-center justify-content-between">
                    <input type="radio" id="valor-parcela" name="valor" value="valor-parcela" class="d-none">
                    <label for="valor-parcela"
                        class="select-simulacao parcela d-flex align-items-center justify-content-center p-3">valor da
                        parcela</label>

                    <input type="radio" id="valor-bem" name="valor" value="valor-bem" class="d-none">
                    <label for="valor-bem"
                        class="select-simulacao  bem d-flex align-items-center justify-content-center p-3">valor do
                        bem</label>
                </div>
            </div>

            <div class="input-range d-none">
                <label for="valor-desejado" class="mb-3 mt-4">Valor que deseja pagar</label>
                <input type="range" min="100000" max="200000" name="valor-desejado" id="valor-desejado"
                    class="range-valor w-100" data-min-parcela="" data-max-parcela="" data-min-bem="" data-max-bem="">
                <div class="valor-range d-flex align-items-center justify-content-around mt-4">
                    <span class="valor-minimo">R$ 100.000,00</span>
                    <span class="valor-selecionado pb-1">R$ 50.000,00</span>
                    <span class="valor-maximo">R$200.000,00</span>
                </div>
            </div>

            <div class="simular-consorcio-btn d-none">
                <button type="submit" id="btn-input-simular"
                    class="d-flex align-items-center justify-content-between mb-2 mt-4 p-3 btn">
                    <span>simular consórcio</span>
                    <img src="{{ asset('images/gerais/seta.png') }}" alt="" srcset="">
                </button>
            </div>
        </form>

        <div class="content-valores-planos mt-3 d-none">
            <div class="header-valores-planos d-flex align-items-start justify-content-between mb-3">
                <div class="">
                    <h1>simular <br>consórcio</h1>
                    <p class="mt-3">Veja os resultados da simulação:</p>
                </div>

                <button id="refazer-simulacao" class="d-flex align-items-center btn">
                    <span>Fazer outra <br>simulação</span>
                    <img class="ml-2" src="{{ asset('images/simulador/refresh.png') }}" alt="" srcset="">
                </button>
            </div>

            <div class="loading align-items-center justify-content-center mt-5">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div id="lista-consorcios">

            </div>

        </div>
    </div>
</div>

<div class="cadastrar-email d-none"></div>
<div class="content-cadastrar-email d-none">
    <div class="d-flex justify-content-end">
        <a href="" id="fechar-cadastro-email" class="align-self-end d-flex align-items-center justify-content-center">
            <div></div>
            <div></div>
        </a>
    </div>
    <div id="plano-0" class="content d-flex flex-column align-items-center justify-content-center px-2">


        <form action="{{ route('store.lead') }}"
            class="d-flex flex-column align-items-center justify-content-center w-100" method="POST">
            @csrf
            <input type="hidden" name="bem" id="input_bem">
            <input type="hidden" name="value" id="input_value">
            <input type="text" id="fone-cliente" class="fone-cliente phone_with_ddd" name="fone-cliente"
                placeholder="(99) 99999-9999">
            <input type="text" id="fone-cliente" class="fone-cliente" name="nome-cliente" placeholder="Seu Nome"
                required>
            <button type="submit" class="btn d-flex align-items-center justify-content-center">
                <span>Enviar</span>
                <img class="ml-2" src="{{ asset('images/simular-consorcios/seta.png') }}" alt="Ir">
            </button>

        </form>

        <div class="text d-flex align-items-center justify-content-center">
            <div class="">
                <h1>não encontrou o que precisa?</h1>
                <p class="my-3">Deixe seu telefone que temos o plano personalizado ideal para você</p>
            </div>
            {{-- <img class="img-text" src="{{ asset('images/simulador/paper-plane.png') }}" alt="" srcset=""> --}}
        </div>

    </div>

</div>

<div class="modal-simulator"></div>
