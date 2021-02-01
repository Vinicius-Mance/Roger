let loginBox = document.getElementById('loginBox');

let registerBox = document.getElementById('registerBox');

let registerForm = document.getElementById('registerForm');

let loginboxUp = true;

const toggleLoginBox = () => {
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

let showRegisterButton = document.getElementById('showRegisterButton');
showRegisterButton.onclick = function() {toggleLoginBox();}

let switchRegisterButton = document.getElementById('switchRegisterButton');
switchRegisterButton.onclick = function() {toggleLoginBox();}

let submitRegisterButton = document.getElementById('submitRegisterButton');
// submitRegisterButton.onclick = function(e){e.preventDefault(); getUserValitadionInfo();};


const getUserValitadionInfo = () => {
  fetch("api/getAllUsers")
    .then(userData => {
      if (!userData.ok) {
        throw new Error(`HTTP error, status ${userData.status}`);
      }
        return userData.json();
  }).then(({users}) => {
      validateUserRegister(users);
  })
    .catch(error =>{
      console.log(error.message);
  });
}


let registerName = document.getElementById('registerName');
let registerNameError = document.getElementById('registerNameError');

let registerEmail = document.getElementById('registerEmail');
let registerEmailError = document.getElementById('registerEmailError');

let registerPassword = document.getElementById('registerPassword');
let registerPasswordError = document.getElementById('registerPasswordError');

let registerPasswordConfirmation = document.getElementById('registerPasswordConfirmation');
let registerPasswordConfirmationError = document.getElementById('registerPasswordConfirmationError');


validateUserRegister = users => {

  let nameOk = true;
  let emailOk = true;
  let passwordOk = true;
  let passwordConfirmationOk = true;

    if (registerName.value.length <= 6) {
      registerNameError.innerHTML = "Use 6 or more characters";
      nameOk = false;
    } else if (registerName.value == /^[a-zA-Z0-9\s]+$/) {
      registerNameError.innerHTML = "Name can't have special characters";
      nameOk = false;
    } else {
      registerNameError.innerHTML = "";
    }

    for (var i = 0; i < users.length; i++) {

      if (users[i].email == registerEmail.value) {
        registerEmailError.innerHTML = "Email already registered";
        emailOk = false;
        break;
      } else if (registerEmail.value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
        registerEmailError.innerHTML = "";
      } else {
        registerEmailError.innerHTML = "Insert a valid email";
        emailOk = false;
        break;
      }

    }

    if (registerPassword.value < 6) {
      registerPasswordError.innerHTML = "Use 6 or more characters";
      passwordOk = false;
    } else if (registerPassword.value == /^[a-zA-Z0-9\s]+$/) {
      registerPasswordError.innerHTML = "Name can't have special characters";
      passwordOk = false;
    } else {
      registerPasswordError.innerHTML = "";
    }

    if (registerPasswordConfirmation.value != registerPassword.value) {
      registerPasswordConfirmationError.innerHTML = "Passwords don't match";
      passwordConfirmationOk = false;
    } else {
      registerPasswordConfirmationError.innerHTML = "";
    }

    if (nameOk && emailOk && passwordOk && passwordConfirmationOk) {
      registerForm.submit();
    }

}


let userProfilePic = document.getElementById('userProfilePic');
let userProfilePicSelector = document.getElementById("userProfilePicSelector");

userProfilePicSelector.onchange = evt => {
    const reader = new FileReader();
    reader.onload = function (e) {
      userProfilePic.src = e.target.result;
    };
    reader.readAsDataURL(evt.target.files[0]);
};

function checkFileDetails() {
  var fi = document.getElementById('userProfilePicSelector');
    if (fi.files.length > 0) {

      for (var i = 0; i <= fi.files.length - 1; i++) {
        var fileName, fileExtension, fileSize, fileType, dateModified;
        fileName = fi.files.item(i).name;
        fileExtension = fileName.replace(/^.*\./, '');

        if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
          readImageFile(fi.files.item(i));
          console.log("bruh");// GET IMAGE INFO USING fileReader().
        } else { 
          console.log("potato");
          fileSize = fi.files.item(i).size;
          fileType = fi.files.item(i).type;
          dateModified = fi.files.item(i).lastModifiedDate;
        }
      }

            // GET THE IMAGE WIDTH AND HEIGHT USING fileReader() API.
      function readImageFile(file) {
        var reader = new FileReader(); // CREATE AN NEW INSTANCE.
          reader.onload = function (e) {

          var img = new Image();
            img.src = e.target.result;

          img.onload = function () {
            var w = this.width;
            var h = this.height;

          document.getElementById('fileInfo').innerHTML =
            document.getElementById('fileInfo').innerHTML + '<br /> ' +
              'Name: <b>' + file.name + '</b> <br />' +
              'File Extension: <b>' + fileExtension + '</b> <br />' +
              'Width: <b>' + w + '</b> <br />' +
              'Height: <b>' + h + '</b> <br />' +
              'Type: <b>' + file.type + '</b> <br />'
          }
      };
        reader.readAsDataURL(file);
      }
  }
}
