<?php
  // O formulário deve trabalhar com método POST e possuir o
  // atributo enctype="multipart/form-data"
  // Não esqueça de criar a pasta que vai receber as imagens.
  // Ela deve estar dentro do projeto.
  // Redefinir as permissões dessa pasta (se necessário).
  $pasta = "imagens/";

  // 'imagem' é o name do campo input type='file' do formulário
  $extensao = "." . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
  // Novo nome pode ser gerado por uma série de combinações.
  $novoNome = time() . md5(uniqid());
  $arquivoServidor = $pasta . $novoNome . $extensao;
  move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivoServidor);
?>
