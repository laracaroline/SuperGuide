$(function(){
	$(document).on("submit", "#login_form", function(){
		event.preventDefault();

		$.ajax({
			type: "POST",
			url:"../../PHP/cadastro/inserir_marca.php",
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
          minlength: 2
        },
        descricao:{
          required: true
        }
      }
    })
  })
});
