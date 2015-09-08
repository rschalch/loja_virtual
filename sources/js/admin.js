$(function () {

	/*if ($('#product').length != 0) {
		$('#product').submit(function (e) {
			e.preventDefault();

			// var data = toObject($(this).serializeArray());

			var kq = [];

			$.each($('input[name="kitqtd[]"]'), function (index) {

				//				console.log(index);

				var cod = $(this).attr('id');
				var qtd = $(this).val();

				kq[index] = {cod: cod, qtd: qtd };
			});

			$.ajaxFileUpload({
				url          : 'http://localhost/crismetal.com.br/public_html/loja_virtual/gerente/product/add',
				secureuri    : false,
				fileElementId: 'imagefile',
				dataType     : 'json',
				data         : {
					'codigo': $('#codigo').val(),
					'valor' : $('#valor').val(),
					'desc'  : $('#desc').val(),
					'peso'  : $('#peso').val(),
					'medida': $('#medida').val(),
					'texto' : $('#texto').val(),
					'kitqtd': kq
				},
				success      : function (data, status) {

					if (data.status != 'error') {
						$('#files').html('<p>Reloading files...</p>');
						$('#codigo').val('');
						$('#valor').val('');
						$('#desc').val('');
						$('#peso').val('');
						$('#medida').val('');
					}
					alert(data.msg);
				}
			});
			return false;
		});
	}*/

	if ($('#form-add-client').length != 0) {
		$('#form-add-client').validate({
			rules   : {
				codigo   : {
					required : true,
					number   : true,
					minlength: 5,
					maxlength: 5
				},
				nome     : {
					required: true
				},
				sobrenome: {
					required: true
				},
				email    : {
					required: true,
					email   : true
				},
				senha    : {
					required : true,
					minlength: 8,
					maxlength: 8
				},
				senha2   : {
					required: true,
					equalTo : '#senha'
				},
				ddd      : {
					required : true,
					minlength: 2,
					maxlength: 2,
					number   : true
				},
				telefone : {
					required : true,
					maxlength: 10,
					number   : true
				},
				endereco : {
					required: true
				},
				numero   : {
					required: true,
					number  : true
				},
				bairro   : {
					required: true
				},
				cidade   : {
					required: true
				},
				cep      : {
					required : true,
					number   : true,
					minlength: 8,
					maxlength: 8
				}
			},
			messages: {
				codigo   : {
					required : 'campo obrigatório',
					number   : 'digite apenas números',
					minlength: 'mínimo de 5 caracteres',
					maxlength: 'máximo de 5 caracteres'
				},
				nome     : {
					required: 'campo obrigatório'
				},
				sobrenome: {
					required: 'campo obrigatório'
				},
				email    : {
					required: 'campo obrigatório',
					email   : 'email inválido'
				},
				senha    : {
					required : 'campo obrigatório',
					minlength: 'mínimo de 8 caracteres',
					maxlength: 'máximo de 8 caracteres'
				},
				senha2   : {
					required: 'campo obrigatório',
					equalTo : 'senhas devem ser iguais'
				},
				ddd      : {
					required : 'campo obrigatório',
					minlength: 'mínimo de 2 caracteres',
					maxlength: 'máximo de 2 caracteres',
					number   : 'digite apenas números'
				},
				telefone : {
					required : 'campo obrigatório',
					maxlength: 'máximo de 10 caracteres',
					number   : 'apenas números'
				},
				endereco : {
					required: 'campo obrigatório'
				},
				numero   : {
					required: 'campo obrigatório',
					number  : 'digite apenas números'
				},
				bairro   : {
					required: 'campo obrigatório'
				},
				cidade   : {
					required: 'campo obrigatório'
				},
				cep      : {
					required : 'campo obrigatório',
					number   : 'apenas números',
					minlength: 'mínimo de 8 caracteres',
					maxlength: 'máximo de 8 caracteres'
				}
			}
		});
	}

	if ($('#form-update-client').length != 0) {
		$('#form-update-client').validate({
			rules   : {
				codigo   : {
					required : true,
					number   : true,
					minlength: 5,
					maxlength: 5
				},
				nome     : {
					required: true
				},
				sobrenome: {
					required: true
				},
				email    : {
					required: true,
					email   : true
				},
				senha    : {
					required : true,
					minlength: 8,
					maxlength: 8
				},
				senha2   : {
					required: true,
					equalTo : '#senha'
				},
				ddd      : {
					required : true,
					minlength: 2,
					maxlength: 2,
					number   : true
				},
				telefone : {
					required : true,
					maxlength: 10
				},
				endereco : {
					required: true
				},
				numero   : {
					required: true,
					number  : true
				},
				bairro   : {
					required: true
				},
				cidade   : {
					required: true
				},
				cep      : {
					required : true,
					number   : true,
					minlength: 8,
					maxlength: 8
				}
			},
			messages: {
				codigo   : {
					required : 'campo obrigatório',
					number   : 'digite apenas números',
					minlength: 'mínimo de 5 caracteres',
					maxlength: 'máximo de 5 caracteres'
				},
				nome     : {
					required: 'campo obrigatório'
				},
				sobrenome: {
					required: 'campo obrigatório'
				},
				email    : {
					required: 'campo obrigatório',
					email   : 'email inválido'
				},
				senha    : {
					required : 'campo obrigatório',
					minlength: 'mínimo de 8 caracteres',
					maxlength: 'máximo de 8 caracteres'
				},
				senha2   : {
					required: 'campo obrigatório',
					equalTo : 'senhas devem ser iguais'
				},
				ddd      : {
					required : 'campo obrigatório',
					minlength: 'mínimo de 2 caracteres',
					maxlength: 'máximo de 2 caracteres',
					number   : 'digite apenas números'
				},
				telefone : {
					required : 'campo obrigatório',
					maxlength: 'máximo de 10 caracteres'
				},
				endereco : {
					required: 'campo obrigatório'
				},
				numero   : {
					required: 'campo obrigatório',
					number  : 'digite apenas números'
				},
				bairro   : {
					required: 'campo obrigatório'
				},
				cidade   : {
					required: 'campo obrigatório'
				},
				cep      : {
					required : 'campo obrigatório',
					number   : 'apenas números',
					minlength: 'mínimo de 8 caracteres',
					maxlength: 'máximo de 8 caracteres'
				}
			}
		});
	}

	if ($('#pesquisa-pedidos').length != 0) {

		$('#pesquisa-pedidos').validate({
			rules   : {
				cd_cliente   : {
					required : true,
					number   : true
				},
				date1   : {
					required : true
				},
				date2   : {
					required : true
				}
			},
			messages: {
				cd_cliente   : {
					required : 'campo obrigatório',
					number   : 'digite apenas números'
				},
				date1   : {
					required : 'campo obrigatório'
				},
				date2   : {
					required : 'campo obrigatório'
				}
			}
		});


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
});

