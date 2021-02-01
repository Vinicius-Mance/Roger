<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
  </head>
  <body>
<div id="loginBox">
  <form action="/loginUser" method="post">
  @csrf
    <div class="loginFormBox">
      <img class="loginBoxLogo" src="" alt="logo">

      <input id="emailUserLogin" class="loginInput" type="email" name="emailUserLogin" value="{{old('emailUserLogin')}}" placeholder="Email">
      @error ('emailUserLogin')
          <span class="errorValidationMessage">Email não encontrado</span>
      @enderror

      <input id="passwordUserLogin" class="loginInput" type="password" name="passwordUserLogin" placeholder="Senha">
      @error ('passwordUserLogin')
          <span class="errorValidationMessage">Senha incorreta</span>
      @enderror

      <button class="primaryButton" id="submitLoginButton" type="submit" value="upload">Entrar</button>
        <hr>
          <span>Não tem uma conta?</span>
        <button class="primaryButton" id="showRegisterButton" type="button">Cadastre-se</button>
    </div>
  </form>
</div>

<div id="registerBox">
  <form id="registerForm" action="/registerUser" method="post" enctype="multipart/form-data">
    @csrf
    <div class="registerFormBox">
      <h2 class="title">Faça seu cadastro</h2>
    <div class="leftRegisterForm">
      <input id="registerName" class="loginInput" type="text" name="registerName" value="{{old('registerName')}}" placeholder="Nome">
        <span id="registerNameError" class="errorValidationMessage"></span>

      <input id="registerEmail" class="loginInput" type="email" name="registerEmail" value="{{old('registerEmail')}}" placeholder="E-mail">
        <span id="registerEmailError" class="errorValidationMessage"></span>
      <input id="registerPassword" class="loginInput" type="password" name="registerPassword" placeholder="Senha">
        <span id="registerPasswordError" class="errorValidationMessage"></span>

      <input id="registerPasswordConfirmation" class="loginInput" type="password" name="registerPasswordConfirmation" placeholder="Repita sua senha">
        <span id="registerPasswordConfirmationError" class="errorValidationMessage"></span>
      <button class="primaryButton" id="submitRegisterButton" type="submit" value="upload">Cadastrar</button>
        <hr>
          <span>Lembrou da sua conta?</span>

      <button class="primaryButton" id="switchRegisterButton" type="button">Faça login</button>
  </div>
      <div class="rightRegisterForm">
        <label for="userProfilePicSelector" id="userProfilePicLabel">
          Selecione sua foto de perfil
          <img id="userProfilePic" src="img/placeholder.png" alt="user photo here">
          <input type="file" id="userProfilePicSelector" name="userProfilePic">
        </label>
        <p id="fileInfo" onclick="checkFileDetails()">a</p>
      </div>
    </div>

  </form>
  </div>
    <script src="js/register.js"></script>
  </body>
</html>
