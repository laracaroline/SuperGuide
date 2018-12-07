$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../PHP/cadastro/logar_supermercado.php",
			data:$(this).serialize(),
			success: function(response){
				if (response == "Logando..."){
					location.href = "home.php";
				}
				$(".form-message").html(response);
			}
		});
	});
});
