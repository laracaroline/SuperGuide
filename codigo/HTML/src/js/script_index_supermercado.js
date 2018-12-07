$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../PHP/cadastro/logar_supermercado.php",
			data:$(this).serialize(),
			async: false,
			success: function(response){
				alert(response);
				if (response == "logando"){
					location.href = "home.php";
				}
				$(".form-message").html(response);
			}
		});
	});
});
 //NAO SERVE PRA NADA