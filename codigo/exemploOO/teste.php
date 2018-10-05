<?php

require_once "Contato.php";
require_once "ContatoDao.php";
require_once "iModeloCrudDao.php";

// Instancia um novo objeto Contato, conforme a classe descrita no arquivo Contato.php
$c1 = new Contato("Fulano Detal", "fulano@teste.com.br", "629987654321");

// Instancia um novo objeto ContatoDao.php
$contatoDao = new ContatoDao();

// Executa o método 'create' que foi escrito na classe ContatoDao.php conforme implementação 
// estabelecida na interface IModeloCrudDao.php
// Esse método gera um novo 'id' para o contato e executa o INSERT no banco.
$contatoDao->create($c1);

// Carrega os dados do contato já cadastrado no banco e que possui o valor 1 como 'id'.
// Os dados são carregados no objeto $c2 (criado e retornado dentro do próprio método 'read')
$c2 = $contatoDao->read(1);

// Define novos valores para os atributos 'nome' e 'email' utilizando os métodos 'set' definidos na
// classe Contato.
$c1->setNome("Ciclano Detal");
$c1->setEmail("ciclano@teste.com.br");

// Atualiza o contato.
$contatoDao->update($c1);

// Deleta o contato que possui o valor 1 para o campo 'id'.
// Lembrete: se você deletar o registro com 'id' 1, não poderal mais carrega-lo na linha 20.
$contatoDao->delete(1)
?>