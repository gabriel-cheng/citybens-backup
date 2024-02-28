try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.Swal = require('sweetalert2');

    require('bootstrap');
    // require('jquery-mask-plugin/dist/jquery.mask');
} catch (e) { }


require('./simulador');
require('./isso-e');
require('select2');
require('./videos');
require('jquery-mask-plugin');

$(document).ready(function(){
    $('.phone_with_ddd').mask('(00) 00000-0000');
});
