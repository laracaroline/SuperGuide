$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../PHP/cadastro/logar_cliente.php",
			data:$(this).serialize(),
			success: function(response){
				if (response == 1){
					location.href = "home.php";
				}
				$(".form-message").html(response);
			}
		});
	});
});
