$(document).ready(function(){
	$("#cpf").mask('000.000.000-00');
	$("#telefone").mask('(00) 0 0000-0000');
	$("#data_nasc").mask('00/00/0000');
	$('#cnpj').mask('00.000.000/0000-00', {reverse: true});
});
