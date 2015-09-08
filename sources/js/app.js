$(document).ready(function () {
	$.reject({
		reject      : {
			msie5: true, msie6: true, msie7: true, msie8: true

			//			safari: true, // Apple Safari
			//			chrome29: true, // Google Chrome
			//			firefox: true, // Mozilla Firefox
			//			msie: true, // Microsoft Internet Explorer
			//			opera: true, // Opera
			//			konqueror: true, // Konqueror (Linux)
			//			unknown: true // Everything else
		},
		display     : ['firefox', 'chrome', 'safari', 'opera'],
		imagePath   : './img/browsers/',
		header      : 'Você sabia que o navegador que está usando é muito antigo?',
		// Paragraph 1
		paragraph1  : 'Seu navegador está desatualizado, e pode não ser compatível com nosso site. Uma lista de navegadores mais modernos pode ser encontrada na lista abaixo.',
		// Paragraph 2
		paragraph2  : 'Selecione um navegador para ir à página de download:',
		close       : true, // Allow closing of window message displayed below closing link
		closeMessage: 'Caso feche essa janela e prossiga com nosso site, poderão ocorrer erros de visualização e funcionamento.',
		closeLink   : 'Fechar janela',
		closeURL    : '#',
		closeESC    : true
	});

	/*$('.fancybox').fancybox({
	 maxWidth	: 800,
	 maxHeight	: 600,
	 fitToView	: false,
	 width		: '40%',
	 height		: '40%',
	 autoSize	: false,
	 closeClick	: false,
	 openEffect	: 'fade',
	 closeEffect	: 'fade'
	 });*/

	$('#cancel').click(function () {
		//		parent.history.back();
		window.location.href = 'http://localhost/crismetal.com.br/public_html/loja_virtual/admin/produtos';
		return false;
	});

	if ($('#tipo_operacao')) {
		$('#tipo_operacao').change(function () {
			if ($("#tipo_operacao").find("option:selected").text() == 'Boleto') {
				$('#bandeira').css("visibility", "hidden");
			}
			else {
				$('#bandeira').css("visibility", "visible");
			}
		});
	}

	// Acompanhe seu pedido : campos de data

	if ($('#pesquisa-pedidos').length != 0) {

		var date1 = $('#date1');
		var date2 = $('#date2');

		date1.Zebra_DatePicker({
			format           : 'd/m/Y',
			first_day_of_week: 0,
			days             : ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			days_abbr        : ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
			months           : ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			show_clear_date  : false,
			show_select_today: false,
			zero_pad         : true,
			pair             : date2
		});

		date2.Zebra_DatePicker({
			format           : 'd/m/Y',
			first_day_of_week: 0,
			days             : ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
			days_abbr        : ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
			months           : ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			show_clear_date  : false,
			show_select_today: false,
			zero_pad         : true,
			direction        : 1
		});
	}

	/*if ($('#pesquisa-pedidos').length != 0) {

	 var date1 = $("#date1");
	 var date2 = $("#date2");

	 date1.mask("99/99/9999", {placeholder: "_"});
	 date2.mask("99/99/9999", {placeholder: "_"});
	 }*/

	return false;
});