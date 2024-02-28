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

    @include('site.includes.header')
    @include('site.partials.vantagens')
    @include('site.partials.simular-consorcios')
    @include('site.partials.quem-somos')
    @include('site.partials.videos')
    @include('site.partials.section-blog')
    @include('site.partials.isso-e')
    @include('site.partials.faca-simulacao')
    @include('site.includes.footer')

    <div class="widget-whatsapp container d-flex justify-content-end">
        <a href="https://api.whatsapp.com/send?phone=55551831176414&text=Olá cheguei pelo site, gostaria de saber mais sobre os consórcios."
            target="_blank" class="widget-whatsapp-link">
            <div class="whatsapp-icon d-flex justify-content-end align-items-center">
                <img src="{{ asset('images/icons/whatsapp-icon.png') }}" alt="Whatsapp">
            </div>
            <p class="d-flex align-items-center justify-content-center">Fale <br> conosco</p>
        </a>
    </div>

    <script src="{{ mix('js/site/app.js') }}"></script>

    <script defer>
        @if (session('success'))
            Swal.fire(
            'Tudo Certo',
            '{{ session('success') }}',
            'success',
            );
        @endif

        @if (session('error'))
            Swal.fire(
            'Ops...',
            '{{ session('error') }}',
            'error',
            );
        @endif
    </script>

    <script defer>
        $("#tipo-consorcio").on('change', function() {

            $(".input-range").addClass('d-none');
            $(".simular-consorcio-btn").addClass('d-none');

            let rota = "{{ route('store.tipo.consorcio') }}";
            let bem = $(this).val();
            let inputRange = $("#valor-desejado");
            $("#input_bem").val(bem);

            $.ajax({
                url: rota,
                crossDomain: true,
                data: {
                    "bem": bem,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        inputRange.data('min-parcela', data.data.samallestInstallament);
                        inputRange.data('max-parcela', data.data.biggestInstallament);

                        inputRange.data('min-bem', data.data.smaaler);
                        inputRange.data('max-bem', data.data.largest);

                    } else {
                        Swal.fire(
                            'Ops...',
                            data.message,
                            'error',
                        );
                    }
                },
                type: 'POST'
            });
        });

        $("#btn-input-simular").on('click', function() {
            let rota = "{{ route('get.consorcios') }}";
            let bem = $("#tipo-consorcio").val();
            let tipoSimulacao = $("input[name='valor']:checked").val();
            let valorRange = $("#valor-desejado").val();
            $("#lista-consorcios").empty();
            $('.loading').addClass('d-flex');
            $('.loading').removeClass('d-none');

            if (tipoSimulacao == "valor-parcela") {
                $.ajax({
                    url: rota,
                    crossDomain: true,
                    data: {
                        "bem": bem,
                        "valor_parcela": valorRange
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            let listaConsorcios = $("#lista-consorcios");

                            const consorciosLista = document.createElement('div');
                            const itemPrimeiroLista = document.createElement('ul');

                            let listaParcelas = data.data.map(function(p, counter) {
                                console.log(p);
                                if (counter == 0) {
                                    return `
                                        <div class="body-valores-plano my-4">
                                            <div class="sobre-plano d-flex adivgn-items-center justify-content-between pb-3">
                                                <span id="first-consorcio" class="qual-plano">${p.bem}</span>
                                                <span id="first-valor-consorcio" class="valor-consorcio-selecionado">R$ ${p.credito}</span>
                                            </div>
                                            <ul class="mt-3 mb-5">
                                                <li class="primeira-descricao mb-1">
                                                    <span>parcelas</span>
                                                    <span>valor mensal</span>
                                                </li>
                                                <li id="plano-item">
                                                    <span id="first-parcela" class="quantidade-parcelas">${p.parcelas}</span>
                                                    <span class="valor-mensal" class="valor-mensal">R$ ${p.valor_parcela}</span>

                                                    <div class="mais-informacoes d-flex align-items-center py-2">
                                                        <span>Mais informacoes</span>
                                                        <a href="https://api.whatsapp.com/send?phone=555518933002873&text=Olá gostaria de saber mais sobre o consórcio de ${p.bem} com o valor de ${p.credito}"
                                                        class="btn btn-complar-plano ml-1">Comprar</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    `;
                                }

                                return `
                                    <div class="body-valores-plano my-4">
                                        <div class="sobre-plano d-flex adivgn-items-center justify-content-between pb-3">
                                            <span class="qual-plano">${p.bem}</span>
                                            <span class="valor-consorcio-selecionado">R$ ${p.credito}</span>
                                        </div>
                                        <ul class="mt-3 mb-5">
                                            <li class="primeira-descricao mb-1">
                                                <span>parcelas</span>
                                                <span>valor mensal</span>
                                            </li>
                                            <li id="plano-item">
                                                <span class="quantidade-parcelas">${p.parcelas}</span>
                                                <span class="valor-mensal">R$ ${p.valor_parcela}</span>

                                                <div class="mais-informacoes d-flex align-items-center py-2">
                                                    <span>Mais informacoes</span>
                                                    <a href="https://api.whatsapp.com/send?phone=555518933002873&text=Olá gostaria de saber mais sobre o consórcio de ${p.bem} com o valor de ${p.credito}"
                                                    class="btn btn-complar-plano ml-1">Comprar</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                `;
                            });


                            let headerConsorcios = listaParcelas.toString().replaceAll(',', '');
                            consorciosLista.innerHTML = headerConsorcios;
                            document.getElementById('lista-consorcios').appendChild(consorciosLista);

                            $('.loading').addClass('d-none');
                            $('.loading').removeClass('d-flex');
                        } else {

                        }
                        $("#plan-form").remove();

                        let plan_selected = // Váriavel criada para tela de envio do lead
                            `<ul id="plan-form">
                            <div class="body-valores-plano my-4">
                                <div class="sobre-plano d-flex adivgn-items-center justify-content-between pb-3">
                                    <span class="qual-plano">${$("#first-consorcio").text()}</span>
                                    <span class="valor-consorcio-selecionado">R$ ${$('#first-valor-consorcio').text()}</span>
                                </div>
                                <ul class="mt-3 mb-5">
                                    <li class="primeira-descricao mb-1">
                                        <span>parcelas</span>
                                        <span>valor mensal</span>
                                    </li>
                                    <li id="plano-item">
                                        <span class="quantidade-parcelas">${$('#first-parcela').text()}</span>
                                        <span class="valor-mensal">R$ ${$("#first-mensal").text()}</span>

                                        <div class="mais-informacoes d-flex align-items-center py-2">
                                            <span>Mais informacoes</span>
                                            <a href="https://api.whatsapp.com/send?phone=555518933002873&text=Olá gostaria de saber mais sobre o consórcio de ${$("#first-consorcio").text()} no valor de R$ ${$('#first-valor-consorcio').text()} com a parcela de R$ ${$("#first-valor-consorcio").text()}"
                                            class="btn btn-complar-plano ml-1">Comprar</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </ul>`;

                        $("#plano-0").append(plan_selected);
                    },
                    type: 'POST'
                });
            } else {
                $.ajax({
                    url: rota,
                    crossDomain: true,
                    data: {
                        "bem": bem,
                        "valor_bem": valorRange
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            let listaConsorcios = $("#lista-consorcios");

                            const consorciosLista = document.createElement('div');

                            $('.loading').addClass('d-flex');
                            $('.loading').removeClass('d-none');

                            data.data.forEach(consorcio => {
                                let listaParcelas = consorcio.parcelas.map(function(p,
                                    counter) {
                                    if (counter == 0) {
                                        return `
                                            <li id="first">
                                                <span id="first-consorcio" class="d-none">${consorcio.bem}</span>
                                                <span id="first-valor-consorcio" class="d-none">${consorcio.credito}</span>
                                                <span id="first-parcela" class="quantidade-parcelas">${p.parcelas}</span>
                                                <span id="first-mensal" class="valor-mensal">R$ ${p.valor_parcela}</span>

                                                <div class="mais-informacoes d-flex align-items-center py-2">
                                                    <span>Mais informacoes</span>
                                                    <a href="https://api.whatsapp.com/send?phone=555518933002873&text=Olá gostaria de saber mais sobre o consórcio de ${consorcio.bem} no valor de R$ ${consorcio.credito} com a parcela de R$ ${p.valor_parcela}"
                                                        class="btn btn-complar-plano ml-1">Comprar</a>
                                                </div>
                                            </li>
                                        `;
                                    }
                                    return `
                                        <li>
                                            <span class="quantidade-parcelas">${p.parcelas}</span>
                                            <span class="valor-mensal">R$ ${p.valor_parcela}</span>

                                            <div class="mais-informacoes d-flex align-items-center py-2">
                                                <span>Mais informacoes</span>
                                                <a href="https://api.whatsapp.com/send?phone=555518933002873&text=Olá gostaria de saber mais sobre o consórcio de ${consorcio.bem} no valor de R$ ${consorcio.credito} com a parcela de R$ ${p.valor_parcela}"
                                                    class="btn btn-complar-plano ml-1">Comprar</a>
                                            </div>
                                        </li>
                                    `;
                                });

                                let headerConsorcios = listaParcelas.toString().replaceAll(',',
                                    '');

                                let itemConsorcio = `
                                    <div class="body-valores-plano">
                                        <div class="sobre-plano d-flex adivgn-items-center justify-content-between pb-3">
                                            <span class="qual-plano">${consorcio.bem}</span>
                                            <span class="valor-consorcio-selecionado">R$ ${consorcio.credito}</span>
                                        </div>
                                        <ul class="mt-3">
                                            <li class="primeira-descricao mb-2">
                                                <span>parcelas</span>
                                                <span>valor mensal</span>
                                            </li>
                                            ${headerConsorcios}
                                        </ul>
                                    </div>
                                `;

                                consorciosLista.innerHTML = itemConsorcio;
                                document.getElementById('lista-consorcios').appendChild(
                                    consorciosLista);
                            });

                            $('.loading').addClass('d-none');
                            $('.loading').removeClass('d-flex');
                        } else {}

                        $("#plan-form").remove();

                        let plan_selected = // Váriavel criada para tela de envio do lead
                            `<ul id="plan-form">
                            <div class="body-valores-plano my-4">
                                <div class="sobre-plano d-flex adivgn-items-center justify-content-between pb-3">
                                    <span class="qual-plano">${$("#first-consorcio").text()}</span>
                                    <span class="valor-consorcio-selecionado">R$ ${$('#first-valor-consorcio').text()}</span>
                                </div>
                                <ul class="mt-3 mb-5">
                                    <li class="primeira-descricao mb-1">
                                        <span>parcelas</span>
                                        <span>valor mensal</span>
                                    </li>
                                    <li id="plano-item">
                                        <span class="quantidade-parcelas">${$('#first-parcela').text()}</span>
                                        <span class="valor-mensal">R$ ${$("#first-mensal").text()}</span>

                                        <div class="mais-informacoes d-flex align-items-center py-2">
                                            <span>Mais informacoes</span>
                                            <a href="https://api.whatsapp.com/send?phone=555518933002873&text=Olá gostaria de saber mais sobre o consórcio de ${$("#first-consorcio").text()} no valor de R$ ${$('#first-valor-consorcio').text()} com a parcela de R$ ${$("#first-mensal").text()}"
                                            class="btn btn-complar-plano ml-1">Comprar</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </ul>`;

                        $("#plano-0").append(plan_selected);
                    },
                    type: 'POST'
                });
            }
        })
    </script>
</body>

</html>
