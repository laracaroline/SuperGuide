$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../../PHP/cadastro/inserir_cliente.php",
			data:$(this).serialize(),
			success: function(response){
				$(".form-message").html(response);
			}
		});
	});

  $(document).ready(function(){
    $("#login_form").validate({
      rules:{
        nome:{
          required: true,
          maxlength: 100,
          minlength: 6,
          minWords: 2
        },
        cpf:{
          required: true
        },
        telefone:{
          required: true,
        },
        email:{
          requerid: true,
          email: true,
        },
        senha:{
          requerid: true
        },
        cidade:{
          requerid: true
        }
      }
    })
  })
});
