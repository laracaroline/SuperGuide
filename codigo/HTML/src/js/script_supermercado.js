$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../../PHP/cadastro/inserir_supermercado.php",
			data:$(this).serialize(),
			success: function(response){
				$(".form-message").html(response);
			}
		});
	});
});
