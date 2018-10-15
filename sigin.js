window.onload = init;

function init() {
  document.getElementById('sigin_button').addEventListener('click',validate,false);
  document.getElementById("sigin_form").addEventListener('keydown',submit_sigin,false);

  document.getElementById("login_button").addEventListener('click',validate_login,false);
  document.getElementById("login_form").addEventListener('keydown',submit_login,false);

}

function validate() {
  document.getElementById('sigin_form').email.addEventListener('focus',remove_error_background,false);
  document.getElementById('sigin_form').password1.addEventListener('focus',remove_error_background,false);
  document.getElementById('sigin_form').password2.addEventListener('focus',remove_error_background,false);
  document.getElementById('sigin_form').username.addEventListener('focus',remove_error_background,false);

  document.getElementById('sigin_form').email.addEventListener('blur',validate_email,false);
  document.getElementById('sigin_form').password1.addEventListener('blur',validate_password,false);
  document.getElementById('sigin_form').password2.addEventListener('blur',validate_password,false);
  document.getElementById('sigin_form').username.addEventListener('blur',validate_username,false);

  // document.getElementById("message").innerHTML = "";

  var count = 0;
  if (!validate_email()) {
    count = count + 1;
  }
  if (!validate_password()) {
    count = count + 1;
  }
  if (!validate_username()) {
    count = count + 1;
  }

  if (!count) {
    document.getElementById("sigin_form").submit();
  }
}

function validate_email() {
  var re = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i;
  var email = document.getElementById("sigin_form").email.value;
  if (!re.test(email)) {
    document.getElementById('sigin_form').email.className = "error_background";
    document.getElementById("message").innerHTML = "Write a correctly email addres.";
    return false;
  } else {
    document.getElementById("message").innerHTML = "";
    return true
  }
}
function validate_username() {
  var re = /^[A-Z_-]{1,20}$/i;
  var username = document.getElementById("sigin_form").username.value;
  if (!re.test(username)) {
    document.getElementById('sigin_form').username.className = "error_background";
    if (document.getElementById("message").innerHTML == '') {
      document.getElementById("message").innerHTML = "Write a correctly username.";
    }
    return false;
  } else {
    document.getElementById("message").innerHTML = "";
    return true
  }
}

function validate_password() {
  var re = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  var password1 = document.getElementById("sigin_form").password1.value;
  var password2 = document.getElementById("sigin_form").password2.value;
  if (!re.test(password1)) {
    document.getElementById('sigin_form').password1.className = "error_background";
    if (document.getElementById("message").innerHTML == '') {
      document.getElementById("message").innerHTML = "Write a correctly password.";
    }
    return false;
  } else {
    document.getElementById("message").innerHTML = "";
  }
  if (password1 !== password2) {
    document.getElementById('sigin_form').password1.className = "error_background";
    document.getElementById('sigin_form').password2.className = "error_background";
    if (!document.getElementById("message").value) {
      document.getElementById("message").innerHTML = "Passwords not the same.";
    }
    return false;
  } else {
    document.getElementById("message").innerHTML = "";
    return true;
  }
}

function remove_error_background(eventObj) {
  eventObj.target.removeAttribute("class");
  if (eventObj.target.name === 'password1' || eventObj.target.name === 'password2') {
    document.getElementById("sigin_form").password1.removeAttribute("class");
    document.getElementById("sigin_form").password2.removeAttribute("class");
  }
}

function submit_login(eventObj) {
  if (eventObj.keyCode == 13) {
    validate_login();
  }
}

function submit_sigin(eventObj) {
  if (eventObj.keyCode == 13) {
    validate();
  }
}

function validate_login() {
  var email = document.getElementById("login_form").email.value;
  var password = document.getElementById("login_form").password.value;

  var re_email = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i;
  var re_password = /\b[A-Z]{6,200}\b/i;

  if (!re_email.test(email)) {
    document.getElementById('message').innerHTML = 'Invalid login or password.';
    return false;
  }
  if (!re_password.test(password)) {
    document.getElementById('message').innerHTML = 'Invalid login or password.';
    return false;
  }

  document.getElementById("login_form").submit();
}
