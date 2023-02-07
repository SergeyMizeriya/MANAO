// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ЛОГИНА КОРРЕКТНО
let loginForm = document.querySelector("#loginid");
loginForm.addEventListener("input", function () {
  if (loginForm.value.length < 6 && loginForm.value.length > 0) {
    document.querySelector("#login-error").innerHTML =
      "введите больше символов";
  } else if (loginForm.value.indexOf(" ") > -1) {
    document.querySelector("#login-error").innerHTML = "без пробелов";
  } else {
    document.querySelector("#login-error").innerHTML = "";
  }

  // СООБЩАЕМ О НАЛИЧИИ ПРОБЕЛОВ
  // if (loginForm.value.indexOf(" ") > -1) {
  //   document.querySelector("#login-error").innerHTML = "без пробелов";
  // } else {
  //   document.querySelector("#login-error").innerHTML = "";
  // }
});

// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ПАРОЛЯ КОРРЕКТНО
let passwordForm = document.querySelector("#password");
passwordForm.addEventListener("input", function () {
  let letters = /(([a-zA-Zа-яА-ЯЁё-і].*\d)|(\d.*[a-zA-Zа-яА-ЯЁё-і]))/;

  // СООБЩАЕМ О СЛИШКОМ КОРОТКОМ ПАРОЛЕ
  if (passwordForm.value.length < 6 && passwordForm.value.length > 0) {
    document.querySelector("#password-error").innerHTML =
      "введите больше символов";
  } else if (
    passwordForm.value.length > 5 &&
    passwordForm.value.match(letters) === null
  ) {
    document.querySelector("#password-error").innerHTML =
      "введите соответсвующий пароль";
  } else if (passwordForm.value.indexOf(" ") > -1) {
    document.querySelector("#password-error").innerHTML = "без пробелов";
  } else {
    document.querySelector("#password-error").innerHTML = "";
  }
});

// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ДУБЛИРОВАННОГО ПАРОЛЯ БЕЗ ПРОБЕЛОВ
let confirmPasswordForm = document.querySelector("#passwordConfirm");
confirmPasswordForm.addEventListener("input", function () {
  // СООБЩАЕМ О НАЛИЧИИ ПРОБЕЛОВ
  if (confirmPasswordForm.value.indexOf(" ") > -1) {
    document.querySelector("#password-confirm-error").innerHTML =
      "без пробелов";
  } else {
    document.querySelector("#password-confirm-error").innerHTML = "";
  }
});

// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ПОЧТЫ КОРРЕКТНО
let emailForm = document.querySelector("#email");
emailForm.addEventListener("input", function () {
  // СООБЩАЕМ О НАЛИЧИИ ПРОБЕЛОВ
  if (emailForm.value.indexOf(" ") > -1) {
    document.querySelector("#email-error").innerHTML = "без пробелов";
  } else {
    document.querySelector("#email-error").innerHTML = "";
  }
});

// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ИМЕНИ КОРРЕКТНО
let nameForm = document.querySelector("#name");
nameForm.addEventListener("input", function () {
  let nameLetters = /[0-9]/;
  // console.log(this.value);
  console.log(nameForm.value.match(nameLetters));
  // console.log(passwordForm.value.length);
  if (nameForm.value.length < 3 || nameForm.value.match(nameLetters) !== null) {
    document.querySelector("#full-name-error").innerHTML =
      "введите больше 2 символов, без цифр";
  } else if (nameForm.value.indexOf(" ") > -1) {
    document.querySelector("#full-name-error").innerHTML = "без пробелов";
  } else {
    document.querySelector("#full-name-error").innerHTML = "";
  }

  // // СООБЩАЕМ О НАЛИЧИИ ПРОБЕЛОВ
  // if (nameForm.value.indexOf(" ") > -1) {
  //   document.querySelector("#full-name-error").innerHTML = "без пробелов";
  // } else {
  //   document.querySelector("#full-name-error").innerHTML = "";
  // }
});
