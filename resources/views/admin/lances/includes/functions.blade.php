<script>
    $('#administradora').change(function() {
        let administradora = $(this).val();
        let url = `/administradoras/${administradora}/grupos`;

        $.ajax({
            url: url,
            type: 'get',
            data: {},
            success: function(e) {
                let select_grupos = $('#grupo');
                if (e.length > 0) {
                    select_grupos.html('');
                    select_grupos.addClass('form-control');
                    select_grupos.append(
                        `<option>Selecione um grupo</option>`);
                    e.forEach(opt => {
                        select_grupos.append(
                            `<option value='${opt.id}'>${opt.grupo}</option>`);
                    });
                } else {
                    select_grupos.html('');
                }
            },
            error: function() {
                let select_grupos = $('#grupo');
                select_grupos.html('');
            }
        });
    });

    $("#grupo").change(function() {
        let credito = $("#credito-add");
        let grupo = $('#grupo').val();
        let lance_embutido = $("#lance-embutido-add")
        let rota = `/grupo/${grupo}`;

        $.ajax({
            url: rota,
            data: {},
            success: function(e) {
                if (e) {
                    credito.val(e.grupo.credito);
                    // credito.attr('readonly', 'readonly');
                }
                if (e.lances.length > 0) {
                    lance_embutido.addClass('form-control');
                    lance_embutido.append(
                        `<option value='0'>Selecione um Lance Fixo</option>`);
                    e.lances.forEach(opt => {
                        lance_embutido.append(
                            `<option value='${opt.lance_valor}'>${opt.lance_percentual}% | R$ ${opt.lance_valor}</option>`
                            );
                    });
                } else {
                    select_grupos.html('');
                }
            },
            error: function() {

            },
        });
    });

    $('#administradora').on('change', function() {
        let administradora = $('#administradora').val();
        let url = `/data-lance-valido/${administradora}`
        $.get(
            "/data-lance-valido/" + administradora, {

            },
            function(e) {
                if (e == 0) {
                    $(".alert-warning").removeClass('d-none');
                } else {
                    $(".alert-warning").addClass('d-none');
                }
            }
        )
    });

    function buildEditModal(id) {
        let url = `/lances/${id}`;
        $.get(
            url, {},
            function(e) {
                $("#edit-lance-form").attr('action', url);
                $('#cliente-edit').val(e.cliente);
                $("#grupo-edit").attr("readonly", "readonly");
                $("#cota-edit").val(e.cota);
                $("#cota-edit").attr("readonly", "readonly");
                $("#credito-edit").val(e.credito);
                $("#credito-edit").attr('readonly', 'readonly');
                $('#carta_avaliacao-edit').val(e.carta_avaliacao);
                $("#lance-proprio-edit").val(e.valor_lance_proprio);
                $("#lance-total-edit").val(e.valor_lance_total);
                $("#administradora-edit").val(e.administradora);
                $("#administradora-edit").attr("disabled", "disabled");
                $("#status-edit").val(e.status);
                if (e.quitacao_grupo) {
                    $('#quitacao_grupo').prop('checked', true);
                } else {
                    $('#quitacao_grupo').prop('checked', false);
                }

                let grupo   =   $("#grupo-edit");
                let lance_embutido = $("#lance-embutido-edit")
                let rota = `/grupo/${e.grupo}`;

                $.ajax({
                    url: rota,
                    data: {},
                    success: function(f) {
                        grupo.val(f.grupo.grupo);
                        lance_embutido.html('');
                        if (f.lances.length > 0) {
                            lance_embutido.addClass('form-control');
                            lance_embutido.append(
                                `<option value='0'>Selecione um Lance Fixo</option>`);
                            f.lances.forEach(opt => {
                                lance_embutido.append(
                                    `<option value='${opt.lance_valor}'>${opt.lance_percentual}% | R$ ${opt.lance_valor}</option>`
                                    );
                            });
                            $(`option[value="${e.valor_lance_embutido}"`).prop('selected', true)

                        } else {
                            lance_embutido.html('');
                        }
                    },
                    error: function() {

                    },
                });
            }
        )
    }

    $(".lance-fixo, .lance-proprio, .carta_avaliacao, lance-embutido").on('blur', function(){   // Alterando valores ao trocar o lance
        let consorcio           =   $(this).data('id');
        let credito             =   Number.parseFloat   ($(`.credito[data-id="${consorcio}"]`).val());       // Valor do crédito de tal consórcio
        let lance_fixo          =   Number.parseFloat($(`.lance-fixo[data-id="${consorcio}"]`).val() || 0.00);     // Valor do lance fixo
        let pct_lance_livre     =   Number.parseFloat($(`.lance-proprio[data-id="${consorcio}"]`).val() || 0.00); // Porcentagem do lance proprio
        let pct_lance_embutido  =   Number.parseFloat(($(`.lance-embutido[data-id="${consorcio}"]`).val() || 0.00)); // Porcentagem do lance embutido
        let lance_livre         =   (pct_lance_livre / 100) * credito;  // Calcula valor de lance próprio
        let lance_embutido      =   (pct_lance_embutido / 100) * credito; // Calcula valor de lance embutido
        let pct_carta_aval      =   Number.parseFloat($(`.carta_avaliacao[data-id="${consorcio}"]`).val());
        let carta_avaliacao     =   (pct_carta_aval / 100) * credito;  // Calcula valor da carta de avaliação

        let soma    =   lance_livre + lance_fixo + carta_avaliacao + lance_embutido;

        if (soma >= credito) {
            Swal.fire(
                "Ops...",
                "O Lance total é maior que o crédito",
                "error"
            );
        } else {
            $(`.lance-total[data-id="${consorcio}"]`).val(soma);
        }
    });
</script>
