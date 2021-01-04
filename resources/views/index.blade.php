<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
  </head>
  <body>
     <header>
        <nav> <a href="/" id="mainHeaderText" class="headerText">Main header text</a>
          <a href="/" class="headerText">&laquo; Secondary header text</a>
          <a target="_blank" href="https://www.linkedin.com/in/rogério-rodrigues-86608812"><img id="logo" class="headerText" src="img/linkedInLogo.png" alt="linkedin"></a>
          @auth
          <a href="/logOffUser"><button id="logOffButton" type="button">LogOff</button></a>
          @endauth
          @guest
          <button id="loginButton" type="button">Login</button>
          @endguest
          <div id="loginBox">
            <form action="/loginUser" method="post">
            @csrf
              <div class="loginFormBox">
                <button type="button" id="closeLoginButton" class="closeButton">Fechar</button>
                <img class="loginBoxLogo" src="img/linkedInLogo.png" alt="logo">
                <input class="loginInput" type="email" name="emailUserLogin" value="" placeholder="Email">
                <input class="loginInput" type="password" name="passwordUserLogin" value="" placeholder="Senha">
                <button class="primaryButton" id="submitLoginButton" type="submit">Entrar</button>
                  <hr>
                  <span>Não tem uma conta?</span>
                  <button class="primaryButton" id="showRegisterButton" type="button">Cadastre-se</button>
              </div>
            </form>
          </div>
            {{--//////////////////////////////////////////////////////--}}
          <div id="registerBox">
            <form action="/registerUser" method="post">
              @csrf
              <div class="registerFormBox">
                <button type="button" id="closeRegisterButton" class="closeButton">Fechar</button>
                <h2>Faça seu cadastro</h2>
                <input class="loginInput" type="text" name="registerName" value="" placeholder="Nome">
                <input class="loginInput" type="email" name="registerEmail" value="" placeholder="E-mail">
                <input class="loginInput" type="password" name="registerPassword" value="" placeholder="Senha">
                <input class="loginInput" type="password" name="registerPasswordConfirmation" value="" placeholder="Repita sua senha">
                <button class="primaryButton" id="submitRegisterButton" type="submit">Cadastrar</button>
                <hr>
                <span>Lembrou da sua conta?</span>
                <button class="primaryButton" id="switchRegisterButton" type="button">Faça login</button>
              </div>
            </form>
          </div>
        </nav>
     </header>
    <main id="indexMainBanner">
      <div class="upperBanner">
        <img id="upperBannerLogo" src="img/linkedInLogo.png" alt="">
          <h1 id="upperBannerText">Main banner text here Pack my box with five dozen liquor jugs <a href="#about"><br>&darr;</a></h1>
      </div>
    </main>
    <main id="about" class="Main">
    @for ($i=0; $i < 3; $i++)
      <div class="aboutInfo">
        <h3>Pack my box with five dozen liquor jugs</h3>
          <p>Pack my box with five dozen liquor jugsPack my box with five dozen liquor jugsPack my box with five dozen liquor jugsPack my box with five dozen liquor jugs</p>
      </div>
    @endfor
    </main>
    <main id="stack" class="Main">
        <div class="mainText">
          <h3>Pack my box with five dozen liquor jugs</h3>
          <h1>Pack my box with five dozen liquor jugs</h1>
        </div>
      @for ($i=0; $i < 3; $i++)
      <div class="aboutInfo">
          <img src="img/linkedInLogo.png" alt="icon">
        <h3>Pack my box with five dozen liquor jugs</h3>
          <p>Pack my box with five dozen liquor jugsPack my box with five dozen liquor jugsPack my box with five dozen liquor jugsPack my box with five dozen liquor jugs</p>
      </div>
      @endfor
    </main>
  <script src="js/index.js">

  </script>
  </body>
</html>
