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
      <img class="loginBoxLogo" src="img/linkedInLogo.png" alt="logo">

      <input id="emailUserLogin" class="loginInput" type="email" name="emailUserLogin" value="{{old('emailUserLogin')}}" placeholder="Email">
      @error ('emailUserLogin')
          <span class="errorValidationMessage">Email não encontrado</span>
      @enderror

      <input id="passwordUserLogin" class="loginInput" type="password" name="passwordUserLogin" value="" placeholder="Senha">
      @error ('passwordUserLogin')
          <span class="errorValidationMessage">Senha incorreta</span>
      @enderror

      <button class="primaryButton" id="submitLoginButton" type="submit">Entrar</button>
        <hr>
          <span>Não tem uma conta?</span>
        <button class="primaryButton" id="showRegisterButton" type="button">Cadastre-se</button>
    </div>
  </form>
</div>

<div id="registerBox">
  <form id="registerForm" action="/registerUser" method="post">
    @csrf
    <div class="registerFormBox">
      <h2>Faça seu cadastro</h2>

      <input id="registerName" class="loginInput" type="text" name="registerName" value="{{old('registerName')}}" placeholder="Nome">
        <span id="registerNameError" class="errorValidationMessage"></span>

      <input id="registerEmail" class="loginInput" type="email" name="registerEmail" value="{{old('registerEmail')}}" placeholder="E-mail">
        {{old('registerEmail')}}
        <span id="registerEmailError" class="errorValidationMessage"></span>
      <input id="registerPassword" class="loginInput" type="password" name="registerPassword" placeholder="Senha">
        <span id="registerPasswordError" class="errorValidationMessage"></span>

      <input id="registerPasswordConfirmation" class="loginInput" type="password" name="registerPasswordConfirmation" placeholder="Repita sua senha">
        <span id="registerPasswordConfirmationError" class="errorValidationMessage"></span>

      <button class="primaryButton" id="submitRegisterButton" type="submit">Cadastrar</button>
      <hr>
        <span>Lembrou da sua conta?</span>

      <button class="primaryButton" id="switchRegisterButton" type="button">Faça login</button>

    </div>
  </form>
  </div>
    <script src="js/register.js"></script>
  </body>
</html>
