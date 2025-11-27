<?php

session_start();

$errors = [
  'login' => $_SESSION['login_error']??'',
  'register' => $_SESSION['register_error']?? ''

];

// variavel usada para determina qual formulario esta ativo{login ou cadastro}
$activeForm = $_SESSION['active_form']?? 'login';

//varivel usada para removeer
session_unset();

function showError($error){
  return !empty($error) ? "<p class= 'error-message'>$error</p>" :'';

}

function isActiveForm($formName, $activeForm){
  return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Pagina Cadastro </title>
  <link rel="stylesheet" href="style.css">
</head>

<body>


<!-- login -->
 <form class="formulario" action="login_register.php" method="post" autocomplete="off">

  <!-- FORM LOGIN -->
  <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
    <div class="logoformulario">
      <h1>Login</h1>
      <!-- Mensagem de erro -->
      <?= showError($errors['login'] ?? null); ?>
    </div>

    <label for="email">E-mail</label>
    <div class="input-box">
      <i class="fa fa-envelope icon"></i>
      <input type="email" name="email" placeholder="seu@email.com" required>
    </div>

    <label for="password">Senha</label>
    <div class="input-box">
      <i class="fa fa-lock icon"></i>
      <input type="password" name="password" placeholder="••••••••" required>
    </div>

    <button type="submit" name="login" class="Cadastro">Entrar na Conta</button>

    <div class="separator"><span>OU</span></div>

    <p class="login-text">
      Não tem conta?
      <a href="#" onclick="showForm('register-form')">Faça Cadastro</a>
    </p>
  </div>

  <!-- FORM CADASTRO -->
  <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
    <div class="logoformulario">
      <h1>Crie sua conta</h1>
      <?= showError($errors['register'] ?? null); ?>
      <p>Junte-se a nós</p>
    </div>

    <label for="nome">Nome Completo</label>
    <div class="input-box">
      <i class="fa fa-user icon"></i>
      <input type="text" name="nome" placeholder="João Silva" required>
    </div>

    <label for="email">E-mail</label>
    <div class="input-box">
      <i class="fa fa-envelope icon"></i>
      <input type="email" name="email" placeholder="seu@email.com" required>
    </div>

    <label for="password">Senha</label>
    <div class="input-box">
      <i class="fa fa-lock icon"></i>
      <input type="password" name="password" placeholder="••••••••" required>
    </div>
    <div class="">
      <label for="">Selecione</label>
      <select name="role" id="" required >
          <option value="">Selecione Role--</option>
          <option value="">User</option>
          <option value="">Admin</option>
      </select>
    </div>

    <div class="concordo-termo">
      <input type="checkbox" required>
      <p>Eu concordo com os <strong><u>termos</u></strong></p>
    </div>

    <button type="submit" name="register" class="Cadastro">Criar Conta</button>

    <div class="separator"><span>OU</span></div>

    <p class="login-text">
      Já tem conta?
      <a href="#" onclick="showForm('login-form')">Faça login</a>
    </p>
  </div>

</form>

  
 
  
<script src="script.js"></script>
</body>

</html>