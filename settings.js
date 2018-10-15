window.onload = init;

function init() {
  document.getElementById('setting_button_change_personal_data').addEventListener('click',validate_setting_change_personal_data,false);
  document.getElementById('change_photo').addEventListener('click',show_setting_avatar,false);
  document.getElementById('cansel_setting_avatar').addEventListener('click',none_setting_avatar,false);

  document.getElementById('setting_button_change_password').addEventListener('click',validate_setting_change_password,false);
}

function show_setting_avatar() {
  document.getElementById("avatar_setting").className = "avatar_setting_show";
}
function none_setting_avatar() {
  document.getElementById("avatar_setting").removeAttribute("class");
}

function validate_setting_change_personal_data() {
  document.getElementById("setting_form_personal_data").email.addEventListener('blur',validate_email,false);
  document.getElementById("setting_form_personal_data").email.addEventListener('focus',remove_error_background,false);

  document.getElementById("setting_form_personal_data").user_name.addEventListener('blur',validate_username,false);
  document.getElementById("setting_form_personal_data").user_name.addEventListener('focus',remove_error_background,false);

  document.getElementById("setting_form_personal_data").b_day.addEventListener('blur',validate_birthday,false);
  document.getElementById("setting_form_personal_data").b_day.addEventListener('focus',remove_error_background,false);

  document.getElementById("setting_form_personal_data").sex.addEventListener('blur',validate_sex,false);
  document.getElementById("setting_form_personal_data").sex.addEventListener('focus',remove_error_background,false);

  document.getElementById("message").innerHTML = "";

  var count = 0;

  if (!validate_email()) {
    count = count + 1;
  }

  if (!validate_username()) {
    count = count + 1;
  }

  if (!validate_birthday()) {
    count = count + 1;
  }

  if (!validate_sex()) {
    count = count + 1;
  }
  if (!count) {
    document.getElementById("setting_form_personal_data").submit();
  }
}

function validate_setting_change_password() {
  document.getElementById("setting_form_password").new_password.addEventListener('blur',validate_password,false);
  document.getElementById("setting_form_password").new_password_again.addEventListener('blur',validate_password,false);
  document.getElementById("setting_form_password").new_password.addEventListener('focus',remove_error_background,false);
  document.getElementById("setting_form_password").new_password_again.addEventListener('focus',remove_error_background,false);
  document.getElementById("setting_form_password").old_password.addEventListener('focus',remove_error_background,false);
  document.getElementById("setting_form_password").old_password.addEventListener('focus',remove_error_background,false);
  var count = 0;

  if (!validate_password()) {
    count = count + 1;
  }
  if (!count) {
    document.getElementById("setting_form_password").submit();
  }
}

function validate_password() {
  var re = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  var new_password = document.getElementById("setting_form_password").new_password.value;
  var new_password_again = document.getElementById("setting_form_password").new_password_again.value;
  if (!re.test(new_password)) {
    document.getElementById('setting_form_password').new_password.className = "error_background";
    document.getElementById("message").innerHTML = "Write a correctly password.";
    return false;
  }
  if (new_password !== new_password_again) {
    document.getElementById('setting_form_password').new_password.className = "error_background";
    document.getElementById('setting_form_password').new_password_again.className = "error_background";
    document.getElementById("message").innerHTML = "Passwords not the same.";
    return false;
  }
  var old_password = document.getElementById("setting_form_password").old_password.value;
  if (old_password == "") {
    document.getElementById('setting_form_password').old_password.className = "error_background";
    document.getElementById("message").innerHTML = "Passwords not the same.";
    return false;
  } else {
    return true;
  }
}

function validate_email() {
  var re = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i;
  var email = document.getElementById("setting_form_personal_data").email.value;
  if (!re.test(email)) {
    document.getElementById('setting_form_personal_data').email.className = "error_background";
    document.getElementById("message").innerHTML = "Write a correctly email addres.";
    return false;
  } else {
    return true
  }
}

function validate_username() {
  var re = /^[A-Z_-]{1,20}$/i;
  var username = document.getElementById("setting_form_personal_data").user_name.value;
  if (!re.test(username)) {
    document.getElementById('setting_form_personal_data').user_name.className = "error_background";
    if (document.getElementById("message").innerHTML == '') {
      document.getElementById("message").innerHTML = "Write a correctly username.";
    }
    return false;
  } else {
    return true
  }
}

function validate_birthday() {
  var day = ['day'];
  for (var i = 1; i <= 31; i++) {
    day.push(String(i));
  }
  var year = ['year'];
  for (var j = 1905; j <= 2018; j++) {
    year.push(String(j));
  }
  var month = ['month',
  'january','february','march','april','may','june',
  'july','august','september','october','november','december'];

  var b_day_from_select = document.getElementById("setting_form_personal_data").b_day.value;
  var b_day_in_array = day.indexOf(b_day_from_select);
  if (b_day_in_array < 0) {
    document.getElementById('setting_form_personal_data').b_day.className = "error_background";
  }

  var b_month_from_select = document.getElementById("setting_form_personal_data").b_month.value;
  var b_month_in_array = month.indexOf(b_month_from_select);
  if (b_month_in_array < 0) {
    document.getElementById('setting_form_personal_data').b_month.className = "error_background";
  }

  var b_year_from_select = document.getElementById("setting_form_personal_data").b_year.value;
  var b_year_in_array = year.indexOf(b_year_from_select);
  if (b_year_in_array < 0) {
    document.getElementById('setting_form_personal_data').b_year.className = "error_background";
  }

  if (b_day_in_array < 0 || b_month_in_array < 0 || b_year_in_array < 0) {
    if (document.getElementById("message").innerHTML == '') {
      document.getElementById("message").innerHTML = "Birthday not correctly.";
    }
    return false;
  } else {
    return true;
  }
}

function validate_sex() {
  var sex = ['sex','woman','man'];
  var sex_from_select = document.getElementById("setting_form_personal_data").sex.value;
  var sex_in_array = sex.indexOf(sex_from_select);
  if (sex_in_array < 0) {
    document.getElementById('setting_form_personal_data').sex.className = "error_background";
    if (document.getElementById("message").innerHTML == '') {
      document.getElementById("message").innerHTML = "Sex not correctly.";
    }
    return false;
  }
  else {
    return true;
  }
}

function remove_error_background(eventObj) {
  document.getElementById("message").innerHTML = "";
  eventObj.target.removeAttribute("class");
  if (eventObj.target.name === 'new_password' || eventObj.target.name === 'new_password_again') {
    document.getElementById("setting_form_password").new_password.removeAttribute("class");
    document.getElementById("setting_form_password").new_password_again.removeAttribute("class");
  }
}
