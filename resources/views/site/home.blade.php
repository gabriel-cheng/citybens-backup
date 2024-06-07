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

        <!--Começa aqui-->

        <div id="popup-general-container" style="width: 100vw; height: 100vh; background-color: #0000007e; position: fixed; top: 0; z-index: 999;">
        <div style="background-color: #02B2ED; position: fixed; bottom: 0; font-family: Helvetica, sans-serif; font-weight: 100; width: 100%;" class="popup-container" id="popup-alert-container">
            <div style="position: absolute; top: -55px; right: 50px;">
                <div id="close-button" style="color: #fff; font-size: 50px; cursor: pointer;">X</div>
            </div>
            <div style="margin: 40px; display: flex; justify-content: space-around; flex-wrap: wrap;">
                <div style="font-size: 40px;">
                    <p style="color: #000;">Comunicado</p>
                    <p style="color: #fff;">Alerta de golpe</p>
                </div>
                <div style="width: 100%; max-width: 600px; color: #fff; letter-spacing: 1px;">
                    <p style="margin: 0 0 15px 0;">
                        Informamos que temos recebido relatos de mensagens falsas enviadas por pessoas de má-fé que se passam por profissionais da Citybens. Gostaríamos de alertar a todos que isso se trata de um golpe.
                    </p>
                    <p style="margin: 15px 0">
                        Reforçamos que você nunca deve transferir dinheiro para pessoas físicas, ou jurídicas que se identificarem como representantes autorizados do escritório. Não temos a política de realizar cobranças financeiras por meio de outro número que não seja o nosso oficial <a style="color: black; font-weight: 600;" href="https://wa.me/551831176414">(18) 3117-6414</a>. Para a sua segurança, também recomendamos que você não acesse nenhum link enviado por números desconhecidos nem forneça informações pessoais.
                    </p>
                    <p>
                        O nosso número de contato oficial é <a style="color: black; font-weight: 600;" href="https://wa.me/551831176414">(18) 3117-6414</a>. Se você receber qualquer comunicação suspeita ou tiver dúvidas, entre em contato conosco através deste número.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const popup_container = document.querySelector("#popup-alert-container");
        const close_button = document.querySelector("#close-button");
        const popup_general_container = document.querySelector("#popup-general-container");

        close_button.addEventListener("click", () => {
            popup_container.style.bottom = "-999px";
            popup_general_container.style.display = "none";
        });
    </script>

    <!--Termina aqui-->

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
