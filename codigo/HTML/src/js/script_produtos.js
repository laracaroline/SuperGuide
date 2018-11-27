$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../../PHP/cadastro/inserir_produto.php",
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
          maxlength: 50,
          minlength: 4,
          minWords: 1
        },
        descricao:{
          required: true
        }
      }
    })
  })
  });
