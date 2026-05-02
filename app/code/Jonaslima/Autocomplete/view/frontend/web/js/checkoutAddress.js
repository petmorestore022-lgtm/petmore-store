require([
    'jquery',
    'jquery/ui',
    'uiRegistry'
], function($, registry){

    $(document).ready(function () {

        /**
         * PLACEHOLDERS DOS CAMPOS
         */

         const observer = new MutationObserver(function () {

            var street0 = document.querySelector("[name='street[0]']");
            var street1 = document.querySelector("[name='street[1]']");
            var street2 = document.querySelector("[name='street[2]']");
            var street3 = document.querySelector("[name='street[3]']");

            if (street0) {
                street0.placeholder = "Endereço";
            }

            if (street1) {
                street1.placeholder = "Número";
            }

            if (street2) {
                street2.placeholder = "Complemento";
            }

            if (street3) {
                street3.placeholder = "Bairro";
            }

        });



        observer.observe(document.body, {
            childList: true,
            subtree: true
        });


        /**
         * FUNÇÃO CEP
         */
        $(document).on("focusout", 'input[name="postcode"]', function() {

            var cep = document.getElementsByName("postcode")[0].value;

            $.getJSON(
                "https://brasilapi.com.br/api/cep/v1/" + cep,
                function(data) {

                    // Variáveis
                    var rua = data.street;
                    var bairro = data.neighborhood;
                    var cidade = data.city;
                    var uf = data.state;

                    /**
                     * RUA
                     */
                    if (data.street != undefined) {

                        var street0 = jQuery("[name='street[0]']");

                        street0
                            .val(rua)
                            .trigger('change')
                            .trigger('keyup');
                    }

                    /**
                     * BAIRRO
                     */
                    if (data.neighborhood != undefined) {

                        var street3 = jQuery("[name='street[3]']");

                        street3
                            .val(bairro)
                            .trigger('change')
                            .trigger('keyup');
                    }

                    /**
                     * CIDADE
                     */
                    var city = jQuery("[name='city']");

                    city
                        .val(cidade)
                        .trigger('change')
                        .trigger('keyup');

                    /**
                     * ESTADO
                     */
                    var state_form = jQuery("[name='region_id']");

                    switch(uf){

                        case "AC":
                            state_form.val(485).trigger('change');
                            break;

                        case "AL":
                            state_form.val(486).trigger('change');
                            break;

                        case "AP":
                            state_form.val(487).trigger('change');
                            break;

                        case "AM":
                            state_form.val(488).trigger('change');
                            break;

                        case "BA":
                            state_form.val(489).trigger('change');
                            break;

                        case "CE":
                            state_form.val(490).trigger('change');
                            break;

                        case "DF":
                            state_form.val(511).trigger('change');
                            break;

                        case "ES":
                            state_form.val(491).trigger('change');
                            break;

                        case "GO":
                            state_form.val(492).trigger('change');
                            break;

                        case "MA":
                            state_form.val(493).trigger('change');
                            break;

                        case "MT":
                            state_form.val(494).trigger('change');
                            break;

                        case "MS":
                            state_form.val(495).trigger('change');
                            break;

                        case "MG":
                            state_form.val(496).trigger('change');
                            break;

                        case "PA":
                            state_form.val(497).trigger('change');
                            break;

                        case "PB":
                            state_form.val(498).trigger('change');
                            break;

                        case "PR":
                            state_form.val(499).trigger('change');
                            break;

                        case "PE":
                            state_form.val(500).trigger('change');
                            break;

                        case "PI":
                            state_form.val(501).trigger('change');
                            break;

                        case "RJ":
                            state_form.val(502).trigger('change');
                            break;

                        case "RN":
                            state_form.val(503).trigger('change');
                            break;

                        case "RS":
                            state_form.val(504).trigger('change');
                            break;

                        case "RO":
                            state_form.val(505).trigger('change');
                            break;

                        case "RR":
                            state_form.val(506).trigger('change');
                            break;

                        case "SC":
                            state_form.val(507).trigger('change');
                            break;

                        case "SP":
                            state_form.val(508).trigger('change');
                            break;

                        case "SE":
                            state_form.val(509).trigger('change');
                            break;

                        case "TO":
                            state_form.val(510).trigger('change');
                            break;

                        default:
                            document
                                .getElementsByName('region_id')[0]
                                .getElementsByTagName('option')[0]
                                .selected = 'selected';
                            break;
                    }
                }

            ).fail(function() {

                jQuery("[name='street[0]']").val("");
                jQuery("[name='street[1]']").val("");
                jQuery("[name='street[3]']").val("");
                jQuery("[name='street[4]']").val("");
                jQuery("[name='city']").val("");

            });

        });

    });

});
