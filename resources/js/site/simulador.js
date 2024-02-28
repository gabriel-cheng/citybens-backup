modalSimulador();
formSimulador();
showPlanosConsorcio();

function modalSimulador() {
    $("#abrir-modal, .abrir-modal").on("click", function (e) {
        e.preventDefault();
        $(".modal-simulador").toggleClass("active");

        $(".modal-simulator").addClass("faded");
    });

    $("#fechar-modal").on("click", function (e) {
        e.preventDefault();
        $(".modal-simulador").removeClass("active");
        $(".modal-simulator").removeClass("faded");
    });
}

function formSimulador() {
    $("#tipo-consorcio").on("change", function (e) {
        $(".tipo-simulacao").removeClass("d-none");
        $(".qual-plano").text(
            $("select option").filter(":selected").attr("data-tipo-consorcio")
        );
    });

    $("input[name='valor']").on("click", function () {
        let inputRange = $("#valor-desejado");

        if ($(this).val() == "valor-bem") {
            $("label[for='valor-bem']").addClass("active");
            $("label[for='valor-parcela'").removeClass("active");

            inputRange.attr("min", inputRange.data("min-bem"));
            inputRange.attr("max", inputRange.data("max-bem"));
        } else {
            $("label[for='valor-bem']").removeClass("active");
            $("label[for='valor-parcela'").addClass("active");

            inputRange.attr("min", inputRange.data("min-parcela"));
            inputRange.attr("max", inputRange.data("max-parcela"));
        }

        $(".valor-minimo").text("R$ " + inputRange.attr("min"));
        $(".valor-maximo").text("R$ " + inputRange.attr("max"));
        $(".valor-selecionado").text(
            "R$ " + parseInt(inputRange.val()).toFixed(2).replace(".", ",")
        );

        $(".input-range").removeClass("d-none");
        $(".simular-consorcio-btn").removeClass("d-none");
    });

    $("#valor-desejado").on("input", function (e) {
        var valorInputRange = e.target.value;
        var valorConvert = parseInt(valorInputRange)
            .toFixed(2)
            .replace(".", ",");

        var valorMinimo = $("#valor-desejado").attr("min");
        var valorMaximo = $("#valor-desejado").attr("max");

        $(".valor-minimo").text("R$ " + valorMinimo);
        $(".valor-maximo").text("R$ " + valorMaximo);
        $(".valor-selecionado").text("R$ " + valorConvert);

        $(".valor-consorcio-selecionado").text("R$ " + valorConvert);
    });

    $("#btn-input-simular").on("click", function (e) {
        e.preventDefault();
        $(".content-form").addClass("display-none");
        $(".content-valores-planos").removeClass("d-none");
        // document.getElementById('plano-0').appendChild(document.querySelector('#plano-item'));

        setTimeout(function () {
            $(".cadastrar-email").removeClass("d-none");
            $(".content-cadastrar-email").removeClass("d-none");

            $("#input_value").val(
                $("span.valor-consorcio-selecionado")[0].innerHTML
            );
            $("#fone-cliente").val("");
        }, 1000);
    });
}

function showPlanosConsorcio() {
    $("#refazer-simulacao").on("click", function (e) {
        $(".content-form").removeClass("display-none");
        $(".content-valores-planos").addClass("d-none");
    });

    $("#fechar-cadastro-email").on("click", function (e) {
        e.preventDefault();
        $(".cadastrar-email").addClass("d-none");
        $(".content-cadastrar-email").addClass("d-none");
    });
}
