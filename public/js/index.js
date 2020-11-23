console.log("conectado");
let loginButton = document.getElementById('loginButton');
loginButton.onclick = function() {showLoginBox();}
let loginBox = document.getElementById('loginBox');
let body = document.querySelector('body');
let closeLoginButton = document.getElementById('closeLoginButton');
closeLoginButton.onclick = function() {hideLoginBox();}
const showLoginBox = () => {
  loginBox.style.display = "block";
  body.style.overflow = "hidden";
}

const hideLoginBox = () => {
  loginBox.style.display = "none";
  body.style.overflow = "visible";
}



//////////////////////////////////////////
