let loginBox = document.getElementById('loginBox');

let loginboxUp = true;
const toggleLoginBox = () =>{
  if (loginboxUp == false) {
    loginBox.style.display = 'block';
    setTimeout(function(){ loginBox.style.opacity = 1;}, 1);
    setTimeout(function(){registerBox.style.display = 'none';}, 300);
    registerBox.style.opacity = 0;
    loginboxUp = true;
  } else {
    registerBox.style.display = 'block';
    setTimeout(function(){ registerBox.style.opacity = 1;}, 1);
    setTimeout(function(){loginBox.style.display = 'none';}, 300);
    loginBox.style.opacity = 0;
    loginboxUp = false;
  }
}

let submitLoginButton = document.getElementById('submitLoginButton');
// submitLoginButton.onclick = function(e){e.preventDefault();};

//////////////////////////////////////////

let showRegisterButton = document.getElementById('showRegisterButton');
showRegisterButton.onclick = function() {toggleLoginBox();toggleRegisterBox();}
let registerBox = document.getElementById('registerBox');

let switchRegisterButton = document.getElementById('switchRegisterButton');
switchRegisterButton.onclick = function() {toggleLoginBox();}

let submitRegisterButton = document.getElementById('submitRegisterButton');
// submitRegisterButton.onclick = function(e){e.preventDefault();};

let url = "api/getAllUsers";
const getUserValitadionInfo = () => {
  fetch(url)
    .then(userData => {
      if (!userData.ok) {
        throw new Error(`HTTP error, status ${userData.status}`);
      }
        return userData.json();
  }).then(({users}) => {
    validateUserLogin(users);
  })
    .catch(error =>{
    console.log(error.message);
  });
}
getUserValitadionInfo();


validateUserLogin = users => {
  users.forEach((user) => {
    console.log(user);
    searchAllUsersLoginInfo(user);
  });
}


searchAllUsersInfo = (user, email, password) => {

}
