require('./bootstrap');
require('jquery-mask-plugin/dist/jquery.mask');
require('select2/dist/js/select2');
$('.select2').select2();
$('.money').mask('000.000.000.000.000,00', { reverse: true });
$('#fone-cliente').mask('(00)00000-0000');
