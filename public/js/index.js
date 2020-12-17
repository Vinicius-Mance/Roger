let loginButton = document.getElementById('loginButton');
loginButton.onclick = function() {toggleLoginBox();}
let loginBox = document.getElementById('loginBox');
let body = document.querySelector('body');
let closeLoginButton = document.getElementById('closeLoginButton');
closeLoginButton.onclick = function() {toggleLoginBox();}

let loginboxUp = false;
const toggleLoginBox = () =>{
  if (loginboxUp == false) {
    loginBox.style.display = 'block';
    body.style.overflowY = 'scroll';
    body.style.position = 'fixed';
    setTimeout(function(){ loginBox.style.opacity = 1;}, 1);
    loginboxUp = true;
  } else {
    loginBox.style.opacity = 0;
    setTimeout(function(){loginBox.style.display = 'none';}, 300);
    body.style.overflow = 'visible';
    body.style.position = 'static';
    loginboxUp = false;
  }
}

let submitLoginButton = document.getElementById('submitLoginButton');
submitLoginButton.onclick = function(e){e.preventDefault();};

//////////////////////////////////////////

let showRegisterButton = document.getElementById('showRegisterButton');
showRegisterButton.onclick = function() {toggleLoginBox();toggleRegisterBox();}
let registerBox = document.getElementById('registerBox');
let closeRegisterButton = document.getElementById('closeRegisterButton');
closeRegisterButton.onclick = function() {toggleRegisterBox();}

let registerBoxUp = false;
const toggleRegisterBox = () =>{
  if (registerBoxUp == false) {
    registerBox.style.display = 'block';
    body.style.overflowY = 'scroll';
    body.style.position = 'fixed';
    setTimeout(function(){ registerBox.style.opacity = 1;}, 1);
    registerBoxUp = true;
  } else {
    registerBox.style.opacity = 0;
    setTimeout(function(){registerBox.style.display = 'none';}, 300);
    body.style.overflow = 'visible';
    body.style.position = 'static';
    registerBoxUp = false;
  }
}

let switchRegisterButton = document.getElementById('switchRegisterButton');
let submitRegisterButton = document.getElementById('submitRegisterButton');
submitRegisterButton.onclick = function(e){e.preventDefault();};
