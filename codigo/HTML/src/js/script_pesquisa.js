$(function(){
	$("#pesquisa").keyup(function(){
		//Recuperar o valor do campo
		var pesquisa = $(this).val();

		//Verificar se tem algo digitado
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('pesquisa.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos
				$(".resultado").html(retorna);
			});
		}
	});
});
