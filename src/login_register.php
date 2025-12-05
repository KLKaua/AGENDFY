<?php

// CONDICAO PARA LIDAR COM PROCESSO  DE CADASTRO DE USUARIOO

session_start(); 
require_once 'processar-dados.php'; // importa o arquivo que contem as conexoes com o  banco de dados.

// isset verifica se variavel foi definida ou NAO
if(isset($_POST['register'])){// verifica se o botao de cadastro foi clicado 
   $name =$_POST['nome'];
   $email =$_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // funcao que garante que a senha seja armazenada com segurnaca
   $role = $_POST['role'];
   
   // verifica e armazena um email no banco de dados com metodo QUERY  
   $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
   //email ja registrado ' gera mensagem de "EMAIL CADASTRADO" ' 
   if ($checkEmail->num_rows > 0){
       $_SESSION['register_error'] = 'Email ja cadastrado';
       $_SESSION['active_form']= 'register';
   }else {
      $conn->query("INSERT INTO users (name,email,password, role) VALUE ('$name','$email','$password', '$role')");
   }

   //direciona usuario a pagina principal apos a conclusao do processo 
   // IMPLEMENTAR CAMINHO DO SITE DEPOIS
   header("location:home.php");
   exit();
}


// CONDICAO PARA LIDAR COM LOGIN DE USARIO 

// armazena os dados informados pelo usuario
if(isset($_POST['login'])){
   $email = $_POST['email'];
   $password = $_POST['password'];

   //consulta o banco de dados SQL para achar informacoes refente ao EMAIL
   $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

   // se EMAIL FOR Encontrado no banco 
   // verifica a senha se bate com nome e email
   if ($result->num_rows > 0){
       $user = $result->fetch_assoc();
       if(password_verify($password, $user['password'])){
       $_SESSION['name'] = $user['name'];
       $_SESSION['email'] = $user['email'];

       // se cliente for vendedor SERA direcionado pra pagina de ADMIN

       // caso contrario para pagina de usuario
         if($user['role'] === 'admin'){
                    //pagina ADMIN 
            header("location:admin_page.php");
         }else{
                    // pagina USEr
              header("location:user_page.php");
         }
         exit();
       }
   }

   // caso senha e email incorreto gera mensagem 
   $_SESSION['login_error']= 'email e senha incorreto';
   $_SESSION['active_form']= 'login';
   

   // direciona usuario para pogina principal 
   header("Location:home.php");
   
   exit();

}

?>