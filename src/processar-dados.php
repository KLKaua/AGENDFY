<?php 

// pegando os dados do formulario
// depois salvar esses dados no banco de dados
$host = "localhost";
$nome = $_POST['nome'];
$email = $_POST['email'];
$passaword  = $_POST['password'];
$database = "user_bd";

// //conectando banco de dados MysqlPHp com o projeto 
 $conn = new mysqli($host, $nome, $email,$passaword,$database);

// //verifica a conexao com o banco de dados
 if ($conn->connect_error){
    die ("falha ao se comunicar com banco de dados:".$conn->connection_erro);
 }

?> 